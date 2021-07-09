
DROP DATABASE Oto;

CREATE DATABASE Oto /*!40100 DEFAULT CHARACTER SET utf8 */;

USE Oto;


CREATE TABLE car(
    car_num INT NOT NULL,
    car_brand VARCHAR (50) NOT NULL,
    car_d_manfa DATE NOT NULL,
    car_price DECIMAL(10,2) NOT NULL,
    car_descr TEXT ,
    car_in_stk INT NOT NULL,
    car_new BOOLEAN NOT NULL,
    PRIMARY KEY (car_num)
);

CREATE TABLE services(
   srv_id INT NOT NULL AUTO_INCREMENT,
   srv_repair VARCHAR(255),
   srv_maint VARCHAR(255),
   srv_acces VARCHAR(255),
   srv_opt VARCHAR(255),
   srv_repair_p DECIMAL(4,2),
   srv_maint_p DECIMAL(4,2),
   srv_acces_p DECIMAL(4,2),
   srv_opt_p DECIMAL(4,2),
   PRIMARY KEY(srv_id)
);

CREATE TABLE employee(
    empl_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    empl_name VARCHAR (50),  
    empl_job VARCHAR(255) NOT NULL 
  
);
CREATE TABLE client(
    cli_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    prof_id INT ,
    privt_id INT ,
    cli_fst_name VARCHAR (50) NOT NULL ,
    cli_la_name VARCHAR (50) NOT NULL ,
    cli_adress VARCHAR (255) NOT NULL ,
    cli_ph_num VARCHAR (30) NOT NULL ,
    cli_email VARCHAR (255) NOT NULL  ,
    CONSTRAINT FOREIGN KEY (prof_id) REFERENCES employee(empl_id),
    CONSTRAINT FOREIGN KEY (privt_id) REFERENCES employee(empl_id),
    CONSTRAINT CHK_employee CHECK ((prof_id = null AND privt_id != NULL) OR (privt_id = null AND prof_id != NULL))
);

CREATE TABLE orders(

    ord_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ord_empl_id INT NOT NULL , 
    ord_cli_id INT NOT NULL , 
    ord_date DATETIME NOT NULL ,
    CONSTRAINT FOREIGN KEY (ord_cli_id) REFERENCES client(cli_id),
    CONSTRAINT FOREIGN KEY (ord_empl_id) REFERENCES employee(empl_id) 
);

CREATE TABLE srv_bill(
    ord_num INT ,
    srv_num INT NOT NULL  ,
    srv_list TEXT NOT NULL,
    total_price DECIMAL(6,2) NOT NULL,
    b_date DATETIME NOT NULL ,
    discount DECIMAL(6,2) ,
    CONSTRAINT FOREIGN KEY (ord_num) REFERENCES orders(ord_id),
    CONSTRAINT FOREIGN KEY (srv_num) REFERENCES services(srv_id)

);
CREATE TABLE car_bill(
    ord_num INT ,
    car_num INT NOT NULL ,
    total_price DECIMAL(12,2) NOT NULL,
    b_date DATETIME NOT NULL ,
    discount DECIMAL(10,2) ,
    methd_pay VARCHAR(255),
    quantity INT NOT NULL,
    CONSTRAINT FOREIGN KEY (ord_num) REFERENCES orders(ord_id),
    CONSTRAINT FOREIGN KEY (car_num) REFERENCES car(car_num)  
);


