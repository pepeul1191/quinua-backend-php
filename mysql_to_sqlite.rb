# encoding: UTF-8
# coding: UTF-8
# -*- coding: UTF-8 -*-

require 'sequel'
require 'sqlite3'
require 'mysql'

def coneccion_sqlite3
	Sequel.connect(:adapter=>'sqlite', :database=>File.expand_path('../db/db_ubicaciones.db', __FILE__))
end

def coneccion_mysql
	Sequel.connect(:adapter => 'mysql', :user => 'root', :host => 'localhost', :database => 'db_peru',:password=>'123', :encoding => 'utf8')
end

def cargar_departamentos
	coneccion_mysql[:tb_departamento].each do |row|
		departamentos = coneccion_sqlite3[:departamentos]
		departamentos.insert(:id => row[:id], :nombre => row[:nombre])
	end
end

def cargar_provincias
	coneccion_mysql[:tb_provincia].each do |row|
		provincias = coneccion_sqlite3[:provincias]
		provincias.insert(:id => row[:id], :nombre => row[:nombre], :departamento_id => row[:id_departamento])
	end
end

def cargar_distritos
	coneccion_mysql[:tb_distrito].each do |row|
		db = SQLite3::Database.open "db/db_ubicaciones.db"
		db.execute("INSERT INTO distritos (nombre, provincia_id) VALUES (?, ?)", [row[:nombre], row[:id_provincia]])
		db.close
	end
end

#cargar_departamentos
cargar_provincias
cargar_distritos