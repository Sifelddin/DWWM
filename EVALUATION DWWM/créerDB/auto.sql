
DROP DATABASE Oto;

CREATE DATABASE Oto /*!40100 DEFAULT CHARACTER SET utf8 */;

USE 'Oto';

CREATE TABLE car_category(
    cat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cat_name VARCHAR (50) NOT NULL
    );

CREATE TABLE car(
    car_num INT NOT NULL,
    car_cat_id INT NOT NULL,
    car_brand VARCHAR (50) NOT NULL,
    car_d_manfa DATE NOT NULL,
    car_price DECIMAL(10,2) DEFAULT 0.000 NOT NULL,
    description TEXT ,
    PRIMARY KEY (car_num),
    CONSTRAINT KEY FK_car_cat FOREIGN KEY (car_cat_id) REFERENCES car_category(cat_id)    
);

CREATE TABLE services(
   srv_id INT NOT NULL AUTO_INCREMENT,
   srv_repair VARCHAR(255),
   srv_maint VARCHAR(255),
   srv_acces_opt VARCHAR(255),
   srv_repair_p DECIMAL(4,2),
   srv_maint_p DECIMAL(4,2),
   srv_acces_opt_p DECIMAL(4,2),
   PRIMARY KEY(srv_id)
);

CREATE TABLE client_category(
    cat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cat_name VARCHAR (255) NOT NULL
);

CREATE TABLE client(
    cli_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cli_cat_id INT NOT NULL ,
    cli_name VARCHAR (50) NOT NULL ,
    cli_empl_id INT NOT NULL ,
    cli_adress VARCHAR (255) NOT NULL ,
    cli_ph_nb VARCHAR (30) NOT NULL ,
    cli_email VARCHAR (255) NOT NULL ,
    CONSTRAINT FOREIGN KEY (cli_cat_id) REFERENCES client_category(cat_id),
    CONSTRAINT FOREIGN KEY (cli_empl_id) REFERENCES client(empl_id)
);

CREATE TABLE employee(
    empl_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,  
    empl_job VARCHAR(50) NOT NULL 
);

CREATE TABLE srv_bill(
    cli_num INT NOT NULL PRIMARY KEY  ,
    srv_num INT NOT NULL PRIMARY KEY  ,
    srv_list TEXT NOT NULL,
    total_price DECIMAL(6,2) NOT NULL,
    b_date DATETIME NOT NULL ,
    discount DECIMAL(6,2) ,
    CONSTRAINT FOREIGN KEY (cli_num) REFERENCES client(cli_id),
    CONSTRAINT FOREIGN KEY (srv_num) REFERENCES client(srv_id)

);
CREATE TABLE car_bill(
    cli_num INT NOT NULL PRIMARY KEY  ,
    car_num INT NOT NULL PRIMARY KEY  ,
    car_description TEXT NOT NULL,
    total_price DECIMAL(12,2) NOT NULL,
    b_date DATETIME NOT NULL ,
    discount DECIMAL(10,2) ,
    methd_pay VARCHAR(255),
    CONSTRAINT FOREIGN KEY (cli_num) REFERENCES client(cli_id),
    CONSTRAINT FOREIGN KEY (srv_num) REFERENCES client(car_id)
    
);