create database redsocial;
/*para contar todos los registros de una tabla*/
SELECT COUNT(*) FROM `nombredelatabla`;

create table usuarios(
    id_usuario int(11) primary key not null auto_increment,
    usuario varchar(100) not null,
    email varchar(100) not null,
    foto_perfil varchar(200) default 'images/user-icon.png',
    contrasena varchar(25) not null
);


create table publicaciones(
    id_publicacion int (11) primary key not null auto_increment,
    id_usuario int not null,
    contenido varchar(65535),
    arch_adjunto varchar(255),
    fecha_publicacion timestamp default current_timestamp,
    foreign key (id_usuario) references usuarios(id_usuario)
);


create table solicitudes_amistad(
    id_solicitud int (11) primary key not null auto_increment,
    id_solicitado int NOT null,
    id_solicitante int NOT null,
    estado_solicitud int(1) not null,
    foreign key (id_solicitante) references usuarios(id_usuario),
    foreign key (id_solicitado) references usuarios(id_usuario)

);

create table me_gustas(
    id_me_gusta int(11) primary key not null auto_increment,
    id_usuario int(11) not null,
    id_elemento int(11) not null,
    tipo_elemento varchar(12)
);

create table publicaciones_me_gusta(
    id_me_gusta int(11) primary key not null auto_increment,
    id_usuario int(11) not null,
    id_publicacion int(11) not null,
    foreign key (id_publicacion) references publicaciones(id_publicacion)
);

create table comentarios_me_gusta(
    id_me_gusta int(11) primary key not null auto_increment,
    id_usuario int(11) not null,
    id_comentario int(11) not null,
    
);

create table respuestas_me_gusta(
    id_me_gusta int(11) primary key not null auto_increment,
    id_usuario int(11) not null,
    id_respuesta int(11) not null,
);


create table comentarios(
    id_comentario int(11) primary key not null,
    contenido_com varchar(65535),
    fecha_comentario timestamp default current_timestamp,
    foreign key (id_publicacion) references publicaciones(id_publicacion),
    foreign key (id_usuario) references usuarios(id_usuario)
);

create table respuestas_comentarios(
    id_respuesta int(11) primary key not null,
    contenido_res varchar(65535),
    fecha_respuesta timestamp default current_timestamp,
    id_comentario int(11) not null,
    id_usuario_respuesta int(11) not null,
    foreign key (id_usuario_respuesta) references usuarios(id_usuario),
    foreign key(id_comentario) references comentarios(id_comentario)

);

create table mensajes(
    id_mensaje int(11) primary key not null auto_increment,
    id_emisor int NOT null,
    id_receptor int NOT null,
    contenido_mensaje varchar(65535),
    fecha_mensaje timestamp default current_timestamp,
    foreign key(id_emisor) references usuarios(id_usuario),
    foreign key(id_receptor) references usuarios(id_usuario)
);



create table notificaciones(
    id_notificacion int(11) primary key not null auto_increment,
    contenido varchar(255),
    foreign key(id_remitente) references usuarios(id_usuario),
    foreign key(id_rseceptor) references usuarios(id_usuario)
);

