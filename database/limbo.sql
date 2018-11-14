-- Purpose: Create Limbo database with 3 tables (users, stuff and location) and populate location table
-- Authors: Joe Kariuki, Tawan Scott Nam Hoang
-- Version: 1

-- creating database and using database
drop database if exists limbo_db;
create database if not exists limbo_db;
use limbo_db;


-- create user table
create table users (
user_id int unsigned not null auto_increment,
first_name varchar(20) not null,
last_name varchar(40) not null,
email varchar(60) not null,
pass char(40) not null,
reg_time DATETIME not null,
primary key (user_id),
unique (email)

);

-- insert data into user tables
insert into users (first_name, pass)
values ("admin","gazelle");

-- create stuff tale
create table stuff (
id int not null auto_increment,
location_id int not null,
description text not null,
create_date DATETIME not null,
update_date DATETIME not null,
room text,
owner text,
finder text,
status Set ("found", "lost", "claimed"),
primary key (id)
);

-- create locaitons table
create table locations (
id INT primary key auto_increment,
create_date DATETIME not null,
update_date DATETIME not null,
name TEXT not null
);

insert into locations (name, create_date, update_date)
values ('Byrne House', Now( ), Now( )),
('Cannavino Library', Now( ), Now( )),
('Champagnat Hall', Now( ), Now( )),
('Chapel', Now( ), Now( )),
('Cornell Boathouse', Now( ), Now( )),
('Donnelly Hall', Now( ), Now( )),
('Dyson Center', Now( ), Now( )),
('Fern Tor', Now( ), Now( )),
('Fontaine  Hall', Now( ), Now( )),
('Foy Townhouses', Now( ), Now( )),
('Fulton Street Townhouses (Lower)', Now( ), Now( )),
('Fulton Street Townhouses (Upper)', Now( ), Now( )),
('Greystone Hall', Now( ), Now( )),
('Hancock Center', Now( ), Now( )),
('Kieran Gatehouse', Now( ), Now( )),
('Kirk House', Now( ), Now( )),
('Leo Hall', Now( ), Now( )),
('Longview Park', Now( ), Now( )),
('Lowell Thomas', Now( ), Now( )),
('Lower Townhouses ', Now( ), Now( )),
('Marian Hall', Now( ), Now( )),
('Marist Boathouse', Now( ), Now( )),
('McCann Center', Now( ), Now( )),
('Mid-Rise Hall', Now( ), Now( )),
('North Campus Housing Complex', Now( ), Now( )),
('St. Anns Hermitage', Now( ), Now( )),
('St.Peters', Now( ), Now( )),
('Science and Allied Health Building', Now( ), Now( )),
('Sheahan Hall', Now( ), Now( )),
('Steel Plant Studios and Gallery', Now( ), Now( )),
('Student Center/Music Building', Now( ), Now( )),
('West Cedar Townhouses (Lower)', Now( ), Now( )),
('West Cedar Townhouses (Upper)', Now( ), Now( )
);

select * from users;
select * from stuff;
select * from locations;
