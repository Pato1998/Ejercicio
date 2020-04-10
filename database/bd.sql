drop database eset;

create database eset;

use eset;

create table empresas(
	id int auto_increment,
    nombre varchar(80),
    
    primary key(id)
);

create table tipo_empleado
(
    id int auto_increment,
    nombre varchar(30),
    
    primary key(id)
);


create table especialidades(
 	id int auto_increment,
    tipo_empleado_id int,
    nombre varchar(100),
    
    primary key(id),
    constraint tipo_empleado_id foreign key(tipo_empleado_id) references tipo_empleado(id)
);

create table tipo_especialidad(
	id int auto_increment,
    tipo_empleado_id int,
    especialidad_id int,
    empleado_id int,
    created_at timestamp default now(),
    updated_at timestamp default now(),
    
	
    primary key(id, tipo_empleado_id, especialidad_id, empleado_id),
    constraint _tipo_empleado_id foreign key(tipo_empleado_id) references tipo_empleado(id),
    constraint especialidad_id foreign key(especialidad_id) references especialidades(id)
);

create table empleados(
	id int auto_increment,
    nombre varchar(60),
    apellido varchar(60),
    edad int,
    empresa_id int,
    tipo_empleado_id int,
    tipo_especialidad_id int,
    created_at timestamp default now(),
    updated_at timestamp default now(),
    
    primary key(id),
    constraint empresa_id foreign key (empresa_id) references empresas(id),
	constraint __tipo_empleado_id foreign key(tipo_empleado_id) references tipo_empleado(id),
    constraint _tipo_especialidad_id foreign key(tipo_especialidad_id) references tipo_especialidad(id)
);


alter table tipo_especialidad add constraint empleado_id foreign key(empleado_id) references empleados(id);

insert into tipo_empleado(nombre) values('Programador'),('Diseñador');
insert into especialidades(tipo_empleado_id, nombre) values(1, 'PHP'), (1, 'NET'), (1, 'Python');
insert into especialidades(tipo_empleado_id, nombre) values(2, 'Gráfico'), (2, 'Web');
insert into empresas(nombre) values('Empresa 1'), ('Empresa 2'), ('Empresa 3');