CREATE DATABASE movie;
USE movie;
CREATE TABLE users(
	uid INT AUTO_INCREMENT PRIMARY KEY, 
	uname VARCHAR(50),
	upwd VARCHAR(128)
);
INSERT INTO users VALUES(NULL,'admin','admin');
INSERT INTO users VALUES(NULL,'lhf','lhf');
CREATE TABLE movietype(
	typeid INT AUTO_INCREMENT PRIMARY KEY,
	typename VARCHAR(20),
	typedesc VARCHAR(200)
);
INSERT INTO movietype(typename,typedesc) VALUES('动作片','各种武打动作片');
INSERT INTO movietype(typename,typedesc) VALUES('科幻片','美国科幻片');
INSERT INTO movietype(typename,typedesc) VALUES('爱情片','韩国肥皂爱情片');
INSERT INTO movietype(typename,typedesc) VALUES('枪战','国产');
CREATE TABLE movies(
	movieid INT AUTO_INCREMENT PRIMARY KEY,
	moviename VARCHAR(50),
	movietype INT REFERENCES movietype(typeid),
	moviedate DATE,
	director VARCHAR(20),
	primaryactors VARCHAR(100),
	memo VARCHAR(1000)
);
INSERT INTO movies VALUES(NULL,'毒液',1,'2018-11-15','美国人','美国人','美国人');
INSERT INTO movies VALUES(NULL,'战狼',2,'2018-11-20','中国人','中国人','中国人');
INSERT INTO movies VALUES(NULL,'铁血战士',4,'2018-11-30','日本人','美国人','日本人');
INSERT INTO movies VALUES(NULL,'阿凡达',3,'2018-11-25','欧洲人','美国人','欧洲人');
INSERT INTO movies VALUES(NULL,'铁线虫',4,'2018-11-17','韩国人','韩国人','韩国人');
INSERT INTO movies VALUES(NULL,'黑衣人',3,'2018-12-15','美国人','美国人','美国人');
INSERT INTO movies VALUES(NULL,'黑衣人2',2,'2018-11-15','美国人','美国人','美国人');
INSERT INTO movies VALUES(NULL,'黑衣人3',2,'2018-11-15','美国人','美国人','美国人');
INSERT INTO movies VALUES(NULL,'黑衣人4',4,'2018-11-15','美国人','美国人','美国人');
INSERT INTO movies VALUES(NULL,'黑衣人5',1,'2018-11-15','美国人','美国人','美国人');