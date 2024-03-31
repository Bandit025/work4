CREATE TABLE users (
id_user int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
fname varchar(255) NOT NULL,
lname varchar(255) NOT NULL,
email varchar(255)NOT NULL,
pass varchar(255)NOT NULL,
gender int(5) NOT NULL,
urole int(5)NOT NULL,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE urole (
    id_urole int(5) NOT NULL PRIMARY KEY,
    name_urole varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE gender (
    id_gender int(5) NOT NULL PRIMARY KEY,
    name_gender varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `gender`(`id_gender`, `name_gender`) VALUES ('1','ชาย'),('2','หญิง')

CREATE TABLE course(
id_course int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
name_course varchar(255) NOT NULL,
level_course int(5)NOT NULL,
techer_course int(5)NOT NULL,
price_course int(20) NOT NULL,
detail_course LONGTEXT
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE level_course(
id_level int(5)NOT NULL PRIMARY KEY AUTO_INCREMENT,
name_level varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `level_course`(`id_level`, `name_level`) VALUES ('1','Beginner'),('2','Basic'),('3','Advance'),('4','Premium')

