create database turisex;
use turisex;

create table usuario
(
	idusuario int not null auto_increment primary key,
    fotousuario longblob,
    usuario varchar(100),
    email varchar(100),
    password varchar(100)
);

create table resena
(
	idresena int not null auto_increment primary key,
    idusuario int not null,
    titulo varchar(100),
    descripcion text,
    fotoresena longblob,
    lugar varchar(100),
    creado datetime,
    actualizado datetime,
    
    constraint fk_usuarioresena foreign key(idusuario) references usuario(idusuario)
);

create table comentarios
(
	idcomentario int not null auto_increment primary key,
    idusuario int not null,
    idresena int not null,
    comentario text,
    
    constraint fk_usuariocomentario foreign key(idusuario) references usuario(idusuario),
    constraint fk_resenacomentario foreign key(idresena) references resena(idresena)
);

create table likes
(
	idlike int not null auto_increment primary key,
    idusuario int not null,
    idresena int not null,
    
    constraint fk_usuariolike foreign key(idusuario) references usuario(idusuario),
    constraint fk_resenalike foreign key(idresena) references resena(idresena)
);

