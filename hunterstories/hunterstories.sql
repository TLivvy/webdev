CREATE TABLE user (
email VARCHAR(256) NOT NULL PRIMARY KEY,
username VARCHAR(64) NOT NULL,
password VARCHAR(64) NOT NULL,
admin INTEGER(1) NOT NULL
);

CREATE TABLE stories (
storyid INTEGER(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(64) NOT NULL,
state VARCHAR(15),
story VARCHAR(2000) NOT NULL,
date VARCHAR(11) NOT NULL,
votes INTEGER(11) NOT NULL
);

CREATE TABLE trophies (
trophyid INTEGER(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(64) NOT NULL,
game VARCHAR(10) NOT NULL,
state VARCHAR(15) NOT NULL,
unit VARCHAR(5),
caliber VARCHAR(15),
distance INTEGER(5),
description VARCHAR(250),
photolocation VARCHAR(256) NOT NULL,
date VARCHAR(11) NOT NULL,
votes INTEGER(11) NOT NULL
);