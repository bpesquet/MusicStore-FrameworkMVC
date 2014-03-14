/* Testé sous MySQL 5.x */

drop table if exists T_ARTICLEPANIER;
drop table if exists T_CLIENT;
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
  ALB_IMAGE varchar(50),
  ALB_PRIX decimal(3,2) not null,
  GEN_ID integer not null,
  constraint fk_alb_gen foreign key(GEN_ID) references T_GENRE(GEN_ID),
  ART_ID integer not null,
  constraint fk_alb_art foreign key(ART_ID) references T_ARTISTE(ART_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_CLIENT (
  CLI_ID integer primary key auto_increment,
  CLI_NOM varchar(100) not null,
  CLI_PRENOM varchar(100) not null,
  CLI_ADRESSE varchar(200) not null,
  CLI_CP varchar(5) not null,
  CLI_VILLE varchar(100) not null,
  CLI_COURRIEL varchar(100) not null unique,
  CLI_MDP varchar(100) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_ARTICLEPANIER (
  ARTPAN_ID integer primary key auto_increment,
  ALB_ID integer not null,
  CLI_ID integer not null,
  ARTPAN_QUANTITE integer not null default 1,
  constraint fk_artpan_alb foreign key(ALB_ID) references T_ALBUM(ALB_ID),
  constraint fk_artpan_cli foreign key(CLI_ID) references T_CLIENT(CLI_ID),
  constraint uni_artpan unique(ALB_ID, CLI_ID)
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

insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('Get Behind Me Satan', 2005, 9.90, 'getbehindmesatan.jpg', 1, 1);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('Let It Bleed', 1969, 9.90, 'letitbleed.jpg', 1, 2);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('Mellon Collie And The Infinite Sadness', 1995, 9.90, 'melloncollie.jpg', 1, 6);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('Achtung Baby', 1991, 9.90, 'achtungbaby.jpg', 1, 3);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('London Calling', 1979, 9.90, 'londoncalling.jpg', 1, 7);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('Bossanova', 1990, 9.90, 'bossanova.jpg', 1, 8);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('Definitely Maybe', 1994, 9.90, 'definitelymaybe.jpg', 1, 4);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('Pacific Ocean Blue', 1977, 9.90, 'pacificoceanblue.jpg', 1, 5);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('The Beatles (White Album)', 1968, 9.90, 'thebeatles.jpg', 1, 9);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('Nebraska', 1982, 9.90, 'nebraska.jpg', 1, 10);
insert into T_ALBUM(ALB_NOM, ALB_DATE, ALB_PRIX, ALB_IMAGE,  GEN_ID, ART_ID) values ('Ziggy Stardust', 1972, 9.90, 'ziggystardust.jpg', 1, 11);

insert into T_CLIENT(CLI_NOM, CLI_PRENOM, CLI_ADRESSE, CLI_CP, CLI_VILLE, CLI_COURRIEL, CLI_MDP) values ('Diossy', 'Daisy', '1 rue des oiseaux', '69001', 'LYON', 'daisy@diossy.fr', '12345');
