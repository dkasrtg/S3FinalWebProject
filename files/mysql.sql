DROP DATABASE codeigniterprep;
CREATE DATABASE codeigniterprep;
use codeigniterprep;

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    phone VARCHAR(20),
    email VARCHAR(100),
    password VARCHAR(50)
);

INSERT INTO users values(null,'admin','admin','','admin@admin.com','admin');
INSERT INTO users values(null,'Rakoto','Koto','0332300433','koto@gmail.com','koto');
INSERT INTO users values(null,'Rakoto','Bira','0332300433','bira@gmail.com','bira');


CREATE TABLE category(
    id int primary key AUTO_INCREMENT,
    name varchar(50) 
);

insert into category values(null,'vetement');
insert into category values(null,'cuisine');
insert into category values(null,'inforamtique');
insert into category values(null,'livre');


CREATE TABLE objet(
    id int primary key AUTO_INCREMENT,
    idUser int,
    idCategory int,
    titre varchar(50),
    description varchar(50),
    photos text,
    prix_estimatif double,
    foreign key(idUser) references users(id),
    foreign key(idCategory) references category(id)
);

insert into objet values(null,2,1,'Kiraro','Kiraro','article26.jpg;',1000);
insert into objet values(null,2,2,'Vilany','Vilany','article9.jpg;',500);
insert into objet values(null,2,3,'Laptop','Laptop','article15.jpg;',995);
insert into objet values(null,2,4,'Boky1','Boky1','article25.jpg;',1250);
insert into objet values(null,3,1,'Robe','Robe','article1.jpg;',2000);
insert into objet values(null,3,2,'Four','Four','article11.jpg;',510);
insert into objet values(null,3,3,'Tablette','Tablette','article14.jpg;',3000);
insert into objet values(null,3,4,'Boky2','Boky2','article24.jpg;',975);


CREATE TABLE proposition(
    id int primary key AUTO_INCREMENT,
    idProposeur int references users(id),
    idProposer int references users(id),
    idObjetProposer int,
    DateProposition date NOT NULL,
    foreign key (idObjetProposer) references objet(id) on delete cascade
);
CREATE TABLE objetaproposer(
    id int primary key AUTO_INCREMENT,
    idProposition int,
    idObjet int ,
    foreign key (idProposition) references proposition(id) on delete cascade,
    foreign key (idObjet) references objet(id) on delete cascade
);

CREATE TABLE acceptation(
    id int primary key AUTO_INCREMENT,
    idProposition int ,
    DateAcceptation datetime,
    foreign key(idProposition) references proposition(id) on delete cascade
);

CREATE TABLE refus(
    id int primary key AUTO_INCREMENT,
    idProposition int ,
    DateRefus date,
    foreign key(idProposition) references proposition(id) on delete cascade
);
create table historique(
    id int primary key AUTO_INCREMENT,
    idObjet int ,
    idUser int references users(id),
    DerniereDate datetime ,
    foreign key(idObjet) references objet(id) on delete cascade
);