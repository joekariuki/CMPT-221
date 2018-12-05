-- Purpose: Create Limbo database with 3 tables (users, stuff and location) and populate location table
-- Authors: Joe Kariuki, Tawan Scott Nam Hoang
-- Version: final

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
    pass char(160) not null,
    reg_time DATETIME not null,
    primary key (user_id),
    unique (email)
    
);

-- insert data into user table
-- the password is the hash of 123
insert into users (first_name, last_name, email, pass, reg_time)
values ("admin", "gaze11e", "gaze11e@gmail.com", "e3431a8e0adbf96fd140103dc6f63a3f8fa343ab", now());

create table admins (
    admin_id int unsigned not null auto_increment,
    first_name varchar(20) not null,
    last_name varchar(40) not null,
    email varchar(60) not null,
    pass char(160) not null,
    reg_time DATETIME not null,
    primary key (admin_id),
    unique (email)
);

-- insert data into admins table
-- the password is the hash of 123
insert into admins (first_name, last_name, email, pass, reg_time)
values ("admin", "tyrone", "tyrone@gmail.com", "e3431a8e0adbf96fd140103dc6f63a3f8fa343ab", now());

-- create stuff tale
create table stuff (
    id int not null auto_increment,
    location_name text not null,
    name text not null,
    description text not null,
    create_date DATETIME not null,
    contact_email text not null,
    contact_phone int not null,
    status Set ('found', 'lost'),
    reward Set ('yes','no'),
    reward_amount int,
    image_link text,
    primary key (id)
);

-- insert data to populate stuff tables
insert into stuff (location_name, name, description, create_date, contact_email, contact_phone, status, reward, reward_amount, image_link)
values ('Donnelly Hall', 'Black iPhone 7+', '6 month old iPhone, has a scratch on it', '2018-11-23 00:03:00', 'a@gmail.com', 8453672891, 'lost', 'yes', 50, 'https://images-na.ssl-images-amazon.com/images/I/91Os7OM5%2BFL._SY550_.jpg'),
       ('Donnelly Hall', 'Gucci Slides', 'Has my signature at the back', '2018-10-13 00:02:00','a@gmail.com', 2435678, 'lost', 'no', 2356789012, 'https://luxrack.com/images/items/gucci-slides-slippers-bargain-shop-men.jpg'),
       ('Fulton Street Townhouses (Lower)', 'Gold Casio Watch', 'Has a broken watch dial', '2018-09-23 00:06:00', 'a@gmail.com', 123454300, 'lost', 'yes', 20, 'https://i.ebayimg.com/images/g/zhIAAOSwbqpT1pSn/s-l640.jpg'),
       ('Chapel', 'Shaker Bottle', 'White shaker bottle with a black top', '2018-07-13 00:13:00', 'a@gmail.com', 000, 'found', 'no', 7869082345, 'https://images-na.ssl-images-amazon.com/images/I/61jC%2Bv6qnUL._SY679_.jpg'),
       ('Byrne House', 'Macbook', 'Plain silver Macbook Pro with no stickers', '2018-02-23 00:23:00', 'a@gmail.com', 000, 'found', 'no', 4126534789, 'https://cdn.shopify.com/s/files/1/0299/9993/products/KBGuardMBSL_03.jpg?v=1437692829');
       
-- create locations table
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
select * from admins;