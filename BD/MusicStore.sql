/* Testé sous MySQL 5.x */

drop table if exists T_ALBUM;
drop table if exists T_ARTISTE;
drop table if exists T_GENRE;

create table T_GENRE (
  GEN_ID integer primary key auto_increment,
  GEN_NOM varchar(100) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_ARTISTE (
  ART_ID integer primary key auto_increment,
  ART_NOM varchar(100) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_ALBUM (
  ALB_ID integer primary key auto_increment,
  ALB_NOM varchar(100) not null,
  ALB_DATE date not null,
  GEN_ID integer not null,
  constraint fk_alb_gen foreign key(GEN_ID) references T_GENRE(GEN_ID),
  ART_ID integer not null,
  constraint fk_alb_art foreign key(ART_ID) references T_ARTISTE(ART_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into T_GENRE(GEN_NOM) values ('Pop/Rock');
insert into T_GENRE(GEN_NOM) values ('Classique');
insert into T_GENRE(GEN_NOM) values ('Blues');
insert into T_GENRE(GEN_NOM) values ('R&B');
insert into T_GENRE(GEN_NOM) values ('Rap');
insert into T_GENRE(GEN_NOM) values ('Reggae');
insert into T_GENRE(GEN_NOM) values ('Electro');
insert into T_GENRE(GEN_NOM) values ('Country');
insert into T_GENRE(GEN_NOM) values ('Folk');

insert into T_ARTISTE(ART_NOM) values ('The White Stripes');
insert into T_ARTISTE(ART_NOM) values ('The Rolling Stones');
insert into T_ARTISTE(ART_NOM) values ('U2');
insert into T_ARTISTE(ART_NOM) values ('Oasis');
insert into T_ARTISTE(ART_NOM) values ('Dennis Wilson');
insert into T_ARTISTE(ART_NOM) values ('The Smashing Pumpkins');
insert into T_ARTISTE(ART_NOM) values ('The Clash');
insert into T_ARTISTE(ART_NOM) values ('Pixies');
insert into T_ARTISTE(ART_NOM) values ('The Beatles');
insert into T_ARTISTE(ART_NOM) values ('Bruce Springsteen');
insert into T_ARTISTE(ART_NOM) values ('David Bowie');

insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('Get Behind Me Satan', NOW(), 1, 1);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('Let It Bleed', NOW(), 1, 2);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('Mellon Collie And The Infinite Sadness', NOW(), 1, 6);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('Achtung Baby', NOW(), 1, 3);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('London Calling', NOW(), 1, 7);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('Bossanova', NOW(), 1, 8);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('Definitely Maybe', NOW(), 1, 4);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('Pacifc Ocean Blue', NOW(), 1, 5);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('The Beatles (White Album)', NOW(), 1, 9);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('Nebraska', NOW(), 1, 10);
insert into T_ALBUM(ALB_NOM, ALB_DATE, GEN_ID, ART_ID) values ('Ziggy Stardust', NOW(), 1, 11);


