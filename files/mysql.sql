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


CREATE TABLE Category(
    id int primary key AUTO_INCREMENT,
    name varchar(50) 
);

insert into category values(null,'vetement');
insert into category values(null,'livre');
insert into category values(null,'DVD');
insert into category values(null,'ordinateur');


CREATE TABLE Objet(
    id int primary key AUTO_INCREMENT,
    idUser int,
    idCategory int,
    titre varchar(50),
    description varchar(50),
    photos text,
    prix_estimatif double,
    foreign key(idUser) references Users(id),
    foreign key(idCategory) references Category(id)
);

insert into Objet values(null,2,1,'Tennis','Tennis tennis','1639060272-mizuno-wave-rider-25-on-white-1639060104.jpg;1646856223-1626189650-brooks-ghost-14-16261-1646856166.jpg',1000);
insert into Objet values(null,2,1,'Tennis 00','Tennis tennis','1639060272-mizuno-wave-rider-25-on-white-1639060104.jpg;1646856223-1626189650-brooks-ghost-14-16261-1646856166.jpg',2000);
insert into Objet values(null,3,1,'Tennis 2','Tennis tennis','1639060272-mizuno-wave-rider-25-on-white-1639060104.jpg;1646856223-1626189650-brooks-ghost-14-16261-1646856166.jpg',1000);
insert into Objet values(null,3,1,'Tennis 3','Tennis tennis','1639060272-mizuno-wave-rider-25-on-white-1639060104.jpg;1646856223-1626189650-brooks-ghost-14-16261-1646856166.jpg',1000);


CREATE TABLE Proposition(
    id int primary key AUTO_INCREMENT,
    idProposeur int references users(id),
    idObjetAproposer int references Objet(id) on delete cascade,
    idProposer int references users(id),
    idObjetProposer int references Objet(id) on delete cascade,
    DateProposition date NOT NULL
);

CREATE TABLE Acceptation(
    id int primary key AUTO_INCREMENT,
    idProposition int references Proposition(id) on delete cascade,
    DateAcceptation datetime
);

CREATE TABLE Refus(
    id int primary key AUTO_INCREMENT,
    idProposition int references Proposition(id) on delete cascade,
    DateRefus date
);
create table historique(
    id int primary key AUTO_INCREMENT,
    idObjet int references Objet(id) on delete cascade,
    idUser int references Users(id),
    DerniereDate datetime 
);