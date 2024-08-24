CREATE DATABASE estudio;
show databases; 
use estudio;
create table animales(
	id int,
    tipo varchar(255),
    estado varchar(255),
    primary key (id)
);
alter table animales modify column id int auto_increment; 							# modificar una columna
show create table animales;															# mostrar la declaracion de una tabla

CREATE TABLE `animales` (															# otra forma de crear la tabla de forma mas completa
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

insert into animales (tipo, estado) values ('chachito','feliz');					# insertar valores
insert into animales (tipo, estado) values ('dragon','feliz');	
insert into animales (tipo, estado) values ('felipe','triste');	

select * from animales; 															# consultas
select * from animales where id=1;
select * from animales where estado = 'feliz';
select * from animales where estado = 'feliz' and tipo = 'chachito';

update animales set estado = 'feliz' where id = 3;									#modificar valores

delete from animales where estado = 'feliz';										# eliminar pero con error debido safe mode, unicamente con id
delete from animales where id = 3;

update animales set estado = 'triste' where tipo = 'dragon';						# safe mode tambien occure en update

####### CONDICIONES EN PROFUNDIDAD #########

CREATE TABLE user  (
	id int not null auto_increment,
    name varchar(50) not null,
    edad int not null,
    email varchar(100) not null,
    primary key (id)
);

insert into user (name, edad, email) values ('Oscar', '25', 'oscar@gmail.com');
insert into user (name, edad, email) values ('Layla', '15', 'layla@gmail.com');
insert into user (name, edad, email) values ('Nicolas', '36', 'nico@gmail.com');
insert into user (name, edad, email) values ('Chachito', '7', 'chachito@gmail.com');

select * from user; 
select * from user limit 1; 																#Limitar al primer registro que encuentra
select * from user where edad > 15;
select * from user where edad >= 15;
select * from user where edad >= 20 and email = 'nico@gmail.com';							# and o interseccion
select * from user where edad > 20 or email = 'layla@gmail.com';							# or o union
select * from user where email != 'layla@gmail.com';										# negacion
select * from user where edad between 15 and 30;
select * from user where email like '%gmail%';												# donde email tenga "gmail" sin importar lo de adelante o atras
select * from user where email like '%gmail';												# antes lo que sea y termine en gmail
select * from user where email like 'oscar%';												# empieze con oscar y continue con lo que sea

select * from user order by edad asc;														# mostrar por edades de forma ascendente y descendente
select * from user order by edad desc;

select max(edad) as mayor from user; 														# mayor edad
select min(edad) as menor from user; 														# mayor edad

select id, name from user;																	# mostrar columnas
select id, name as nombre from user;														# mostrar columnas renombradas

####### left join ######### son registros de dos conjuntos a y b donde se seleccionaran los que tengan valores del a pero tambien del b siempre y cuando cummplan las condiciones, la a es la que manda
## es como a-b   + a inter b

create table products(
	id int not null auto_increment,
    name varchar(50) not null,
    created_by int not null, 
    marca varchar(50) not null,
    primary key(id),
    foreign key(created_by) references user(id)
);

rename table products to product;


insert into product (name, created_by, marca)
values 
	('ipad', 1, 'apple'),
    ('iphone', 1, 'apple'),
    ('watch', 2, 'apple'),
    ('macbook', 1, 'apple'),
    ('imac', 3, 'apple'),
    ('ipad mini', 2, 'apple');

select * from product;

##### left join (a-b) + (a ∩ b)
select u.id, u.email, p.name from user u left join product p on u.id = p.created_by;

## rigth join (b-a) + (a ∩ b)
select u.id, u.email, p.name from user u right join product p on u.id = p.created_by;

## inner join (a ∩ b) interseccion
select u.id, u.email, p.name from user u inner join product p on u.id = p.created_by;

## cross join producto cartesiano
select u.id, u.name, p.id, p.name from user u cross join product p;

select count(id), marca from product group by marca;

##group by agrupa filas de valores identicos y se aplican funciones como count, sum y avg

select count(p.id), u.name from product p left join user u on u.id = p.created_by group by p.created_by;

select count(u.id), u.name from user u left join product p on u.id= p.created_by group by u.name;

##having count es decir que tenga un valor o conteo mayor a
select count(p.id), u.name from product p left join user u 
on u.id = p.created_by group by p.created_by
having count(p.id) >= 2;

drop table animales; ##eliminar tablas