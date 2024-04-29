create database if not exists mangas;

USE mangas;

create table if NOT EXISTS manga (
manga_id int primary key auto_increment,
manga_isbn varchar (250) NOT NULL,
manga_name varchar(250) NOT NULL,
manga_description varchar(1500) NOT NULL,
manga_idioma varchar(250) NOT NULL,
manga_precio int(50) NOT NULL,
manga_img varchar(250) NOT NULL,
editorial_id INT NOT NULL,
categoria_id INT NOT NULL
);

create table if NOT EXISTS usuarios (
usuario_id int primary key auto_increment,
usuario_name varchar(250) NOT NULL,
usuario_password  varchar(60) NOT NULL,
usuario_email varchar(250) NOT NULL
);



create table if NOT EXISTS categoria (
categoria_id int primary key auto_increment,
categoria_nombre varchar(250) NOT NULL
);

create table if NOT EXISTS editorial (
editorial_id int primary key auto_increment,
editorial_nombre varchar(250) NOT NULL
);

/*Tabla de contraseñas olvidadas*/

CREATE TABLE forgpasswTokens (
  id int unsigned primary key NOT NULL AUTO_INCREMENT,
  token varchar(255) NOT NULL DEFAULT '',
  usuario_id int NOT NULL,
  created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `token` (`token`)
) DEFAULT CHARSET=utf8mb4;

/*Tabla de likes*/

CREATE TABLE likes (
  likes_id int(11) NOT NULL AUTO_INCREMENT primary key,
  manga_id int(11) NOT NULL,
  usuario_id int(11) NOT NULL,
  UNIQUE KEY `manga_id` (`manga_id`,`usuario_id`)
) DEFAULT CHARSET=utf8mb4;

/*
Aqui añadimos los datos a la base de datos para la tabla categoria
*/   
insert into categoria(
    categoria_nombre
)
values(
    'Aventura'
);
insert into categoria(
    categoria_nombre
)
values(
    'Fantasía'
);
insert into categoria(
    categoria_nombre
)
values(
    'Terror y Misterio'
);

/*
Aqui añadimos los datos a la base de datos para la tabla categoria
*/   
insert into editorial(
    editorial_nombre
)
values(
    'Norma Editorial'
);
insert into editorial(
    editorial_nombre
)
values(
    'Planeta Cómic'
);



/*Añadimos usuarios*/
insert into usuarios(
    usuario_name,
    usuario_password, 
    usuario_email
    )
values(
    'Pablo', 
    '$2y$10$RVR8Mvz8wpJ6cgikyiCQauof//sQ0Ck2iap0G2aa8sEXABr1grElq',
    'pablo@gmail.com'
);
insert into usuarios(
    usuario_name,
    usuario_password, 
    usuario_email
    )
values(
    'Guaire', 
    '$2y$10$wKG.jo0FnOEqYzzns9Z0XOJsX8LFcGyibq3ymchbmvsGFen4autr.',
    'guaire@gmail.com'
);
insert into usuarios(
    usuario_name,
    usuario_password, 
    usuario_email
    )
values(
    'Pepe', 
    '$2y$10$Y4aIHc17XpGtC4hini87WedBNF3c2auFFpxyHgzFNHQkto7gKnNDm',
    'pepe@gmail.com'
);
insert into usuarios(
    usuario_name,
    usuario_password, 
    usuario_email
    )
values(
    'Teo', 
    '$2y$10$RVR8Mvz8wpJ6cgikyiCQauof//sQ0Ck2iap0G2aa8sEXABr1grElq',
    'tedmasterweb@gmail.com'
);

/*
Aqui añadimos los datos a la base de datos para la tabla manga
*/

/*One Piece*/
    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id

        )
    values(
        9788925226323,
        'One Piece 1', 
        'One Piece narra la historia de un joven llamado Monkey D. Luffy, que inspirado por su amigo pirata Shanks, comienza un viaje para alcanzar su sueño, ser el Rey de los piratas, para lo cual deberá encontrar el tesoro One Piece dejado por el anterior rey de los piratas Gol D. Roger.',
        'Español',
        7.30,
        'op01.webp',
        1,
        2
    );
    insert into manga(
    manga_isbn,
    manga_name,
    manga_description,
    manga_idioma,
    manga_precio,
    manga_img,
    categoria_id,
    editorial_id

    )
    values(
        9788925226324,
        'One Piece 2', 
        'One Piece narra la historia de un joven llamado Monkey D. Luffy, que inspirado por su amigo pirata Shanks, comienza un viaje para alcanzar su sueño, ser el Rey de los piratas, para lo cual deberá encontrar el tesoro One Piece dejado por el anterior rey de los piratas Gol D. Roger.',
        'Español',
        7.30,
        'op02.webp',
        1,
        2
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id

        )
    values(
        9788925226325,
        'One Piece 3', 
        'One Piece narra la historia de un joven llamado Monkey D. Luffy, que inspirado por su amigo pirata Shanks, comienza un viaje para alcanzar su sueño, ser el Rey de los piratas, para lo cual deberá encontrar el tesoro One Piece dejado por el anterior rey de los piratas Gol D. Roger.',
        'Español',
        7.30,
        'op03.webp',
        1,
        2
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id

        )
    values(
        9788925226326,
        'One Piece 4', 
        'One Piece narra la historia de un joven llamado Monkey D. Luffy, que inspirado por su amigo pirata Shanks, comienza un viaje para alcanzar su sueño, ser el Rey de los piratas, para lo cual deberá encontrar el tesoro One Piece dejado por el anterior rey de los piratas Gol D. Roger.',
        'Español',
        7.30,
        'op04.webp',
        1,
        2
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id

        )
    values(
        9788925226327,
        'One Piece 5', 
        'One Piece narra la historia de un joven llamado Monkey D. Luffy, que inspirado por su amigo pirata Shanks, comienza un viaje para alcanzar su sueño, ser el Rey de los piratas, para lo cual deberá encontrar el tesoro One Piece dejado por el anterior rey de los piratas Gol D. Roger.',
        'Español',
        7.30,
        'op05.webp',
        1,
        2
    );



/*Jujutsu Kaisen*/

    insert into manga(
    manga_isbn,
    manga_name,
    manga_description,
    manga_idioma,
    manga_precio,
    manga_img,
    categoria_id,
    editorial_id
    )
    values(
        9788925226328,
        'Jujutsu Kaisen 1', 
        'Jujutsu Kaisen sigue la historia de Yuji Itadori, un estudiante de secundaria con habilidades físicas excepcionales que se ve obligado a unirse a un club de ocultismo para salvar a sus amigos de ser atacados por maldiciones. Sin embargo, termina siendo arrastrado al peligroso mundo de los hechiceros malditos.',
        'Español',
        8.00,
        'jjk01.jpeg',
        2,
        1
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id
    )
    values(
        9788925226329,
        'Jujutsu Kaisen 2', 
        'Jujutsu Kaisen sigue la historia de Yuji Itadori, un estudiante de secundaria con habilidades físicas excepcionales que se ve obligado a unirse a un club de ocultismo para salvar a sus amigos de ser atacados por maldiciones. Sin embargo, termina siendo arrastrado al peligroso mundo de los hechiceros malditos.',
        'Español',
        8.00,
        'jjk02.jpeg',
        2,
        1
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id
    )
    values(
        9788925226330,
        'Jujutsu Kaisen 3', 
        'Jujutsu Kaisen sigue la historia de Yuji Itadori, un estudiante de secundaria con habilidades físicas excepcionales que se ve obligado a unirse a un club de ocultismo para salvar a sus amigos de ser atacados por maldiciones. Sin embargo, termina siendo arrastrado al peligroso mundo de los hechiceros malditos.',
        'Español',
        8.00,
        'jjk03.jpeg',
        2,
        1
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id
    )
    values(
        9788925226331,
        'Jujutsu Kaisen 4', 
        'Jujutsu Kaisen sigue la historia de Yuji Itadori, un estudiante de secundaria con habilidades físicas excepcionales que se ve obligado a unirse a un club de ocultismo para salvar a sus amigos de ser atacados por maldiciones. Sin embargo, termina siendo arrastrado al peligroso mundo de los hechiceros malditos.',
        'Español',
        8.00,
        'jjk04.jpeg',
        2,
        1
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id
    )
    values(
        9788925226332,
        'Jujutsu Kaisen 5', 
        'Jujutsu Kaisen sigue la historia de Yuji Itadori, un estudiante de secundaria con habilidades físicas excepcionales que se ve obligado a unirse a un club de ocultismo para salvar a sus amigos de ser atacados por maldiciones. Sin embargo, termina siendo arrastrado al peligroso mundo de los hechiceros malditos.',
        'Español',
        8.00,
        'jjk05.jpeg',
        2,
        1
    );


/*Berserk*/
    insert into manga(
    manga_isbn,
    manga_name,
    manga_description,
    manga_idioma,
    manga_precio,
    manga_img,
    categoria_id,
    editorial_id
    )
    values(
        9788925226333,
        'Berserk 1', 
        'Berserk sigue la historia de Guts, un mercenario solitario con un pasado oscuro, que busca venganza contra un grupo de demonios conocidos como los "Mano de Dios" que le arrebataron todo lo que amaba. En su viaje, Guts lucha contra criaturas sobrenaturales mientras busca su lugar en el mundo.',
        'Español',
        6.50,
        'bk01.jpg',
        3,
        2
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id
    )
    values(
        9788925226334,
        'Berserk 2', 
        'Berserk sigue la historia de Guts, un mercenario solitario con un pasado oscuro, que busca venganza contra un grupo de demonios conocidos como los "Mano de Dios" que le arrebataron todo lo que amaba. En su viaje, Guts lucha contra criaturas sobrenaturales mientras busca su lugar en el mundo.',
        'Español',
        6.50,
        'bk02.jpg',
        3,
        2
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id
    )
    values(
        9788925226335,
        'Berserk 3', 
        'Berserk sigue la historia de Guts, un mercenario solitario con un pasado oscuro, que busca venganza contra un grupo de demonios conocidos como los "Mano de Dios" que le arrebataron todo lo que amaba. En su viaje, Guts lucha contra criaturas sobrenaturales mientras busca su lugar en el mundo.',
        'Español',
        6.50,
        'bk03.jpg',
        3,
        2
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id
    )
    values(
        9788925226336,
        'Berserk 4', 
        'Berserk sigue la historia de Guts, un mercenario solitario con un pasado oscuro, que busca venganza contra un grupo de demonios conocidos como los "Mano de Dios" que le arrebataron todo lo que amaba. En su viaje, Guts lucha contra criaturas sobrenaturales mientras busca su lugar en el mundo.',
        'Español',
        6.50,
        'bk04.webp',
        3,
        2
    );

    insert into manga(
        manga_isbn,
        manga_name,
        manga_description,
        manga_idioma,
        manga_precio,
        manga_img,
        categoria_id,
        editorial_id
    )
    values(
        9788925226337,
        'Berserk 5', 
        'Berserk sigue la historia de Guts, un mercenario solitario con un pasado oscuro, que busca venganza contra un grupo de demonios conocidos como los "Mano de Dios" que le arrebataron todo lo que amaba. En su viaje, Guts lucha contra criaturas sobrenaturales mientras busca su lugar en el mundo.',
        'Español',
        6.50,
        'bk05.jpg',
        3,
        2
    );
