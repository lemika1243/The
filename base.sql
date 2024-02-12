
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
	foreign key(idParcelle) references The_Parcelle(id),
	foreign key(idCueilleur) references The_Cueilleur(id)
);

