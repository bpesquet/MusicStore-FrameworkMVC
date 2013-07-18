/* Testé sous MySQL 5.x */

drop table if exists T_ALBUM;
drop table if exists T_GENRE;

create table T_GENRE (
  GEN_ID integer primary key auto_increment,
  GEN_NOM varchar(100) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_ALBUM (
  ALB_ID integer primary key auto_increment,
  ALB_NOM varchar(100) not null,
  GEN_ID integer not null,
  constraint fk_alb_gen foreign key(GEN_ID) references T_GENRE(GEN_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into T_GENRE(GEN_NOM) values ('Classique');
insert into T_GENRE(GEN_NOM) values ('Pop');
insert into T_GENRE(GEN_NOM) values ('Rock');
insert into T_GENRE(GEN_NOM) values ('Disco');

insert into T_ALBUM(ALB_NOM, GEN_ID) values ('Get Behind Me Satan', 3);
insert into T_ALBUM(ALB_NOM, GEN_ID) values ('Pacifc Ocean Blue', 2);
