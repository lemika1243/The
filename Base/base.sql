
create database the ;
use the ;

create table The_The(
	id int primary key auto_increment,
	nom varchar(50) not null,
	occupation decimal(10,3),
	rendement decimal(10,3),
	prixAchat decimal(10,3),
	prixVente decimal(10,3)
);


create table The_Parcelle (
	id int primary key auto_increment,
	nom varchar(50),
	surface decimal(10,3),
	idThe int ,
	foreign key (idThe) references The_The(id)
);


create table The_Cueilleur (
	id int primary key auto_increment,
	nom varchar(50),
	dateEmbauche date  
);

create table The_CategorieDepense (
	id int primary key auto_increment,
	nom varchar(50) 
);

create table The_Depense (
	id int primary key auto_increment,
	idDep int , 
	dateDepense date ,
	montant decimal(10,2),
	idThe varchar(50),
	foreign key (idDep) references The_CategorieDepense(id)
);

create table The_Salaire(
	id int primary key auto_increment ,
	salaire decimal(10,2),
	dateSalaire date 
);

create table The_Login(
	id int primary key auto_increment ,
	email varchar(20) not null,
	mdp varchar(100) not null,
	type varchar(10)
);

create table The_cueillette (
	id int primary key auto_increment ,
	idParcelle int ,
	idCueilleur int ,
	poids decimal(10,2),
	dateCueillette date,
	foreign key(idParcelle) references The_Parcelle(id),
	foreign key(idCueilleur) references The_Cueilleur(id)
);

create VIEW pieds as
select (surface*10000)/occupation as pieds,p.id as idParcelle,p.nom as parcelNom, t.id as idThe,t.nom as theNom,
rendement from The_The as t join The_Parcelle as p on p.idThe=t.id;

create or replace view theParcelle AS
select t.id as idThe,p.id as idParcelle,p.nom,occupation, rendement, prixVente,surface from The_The as t join The_Parcelle as p on
p.idThe=t.id;

select sum(montant)/sum(rendement) as montant from The_Depense as d join The_The as t on t.id=d.idThe;

select (rendement*pieds)-coalesce(sum(poids),0) as poidsRestant from pieds as p join The_cueillette as c on c.idParcelle=p.idParcelle group by p.idParcelle;

insert into The_Login values(default,'finoana@gmail.com','finoana','admin');
insert into The_Login values(default,'vetso@gmail.com','vetso','admin');
insert into The_Login values(default,'mikajy@gmail.com','mikajy','user');  
insert into The_Login values(default,'victor@gmail.com','victor','user');
