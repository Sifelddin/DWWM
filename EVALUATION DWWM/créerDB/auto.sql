
DROP DATABASE Oto;

CREATE DATABASE Oto /*!40100 DEFAULT CHARACTER SET utf8 */;

USE Oto;

CREATE TABLE car_category(
    cat_name VARCHAR(50) NOT NULL PRIMARY KEY
);

CREATE TABLE car(
    car_num INT NOT NULL,
    car_brand VARCHAR (50) NOT NULL,
    car_d_manfa DATE NOT NULL,
    car_price DECIMAL(10,2) NOT NULL,
    car_descr TEXT ,
    car_in_stk INT NOT NULL,
    car_new BOOLEAN NOT NULL,
    car_cat VARCHAR(50) NOT NULL,
    PRIMARY KEY (car_num),
    CONSTRAINT FOREIGN KEY (car_cat) REFERENCES car_category(cat_name)
);

CREATE TABLE services_products(
   srvPro_id INT NOT NULL AUTO_INCREMENT,
   srv_type VARCHAR(255),
   pro_name VARCHAR(255),
   price DECIMAL(4,2),
   PRIMARY KEY(srvPro_id)
);

CREATE TABLE employee(
    empl_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    empl_name VARCHAR (50),  
    empl_job VARCHAR(255) NOT NULL 
  
);
CREATE TABLE client(
    cli_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    prof_id INT CHECK (prof_id != privt_id),
    privt_id INT CHECK (privt_id != prof_id) ,
    cli_fst_name VARCHAR (50) NOT NULL ,
    cli_la_name VARCHAR (50) NOT NULL ,
    cli_adress VARCHAR (255) NOT NULL ,
    cli_ph_num VARCHAR (30) NOT NULL ,
    cli_email VARCHAR (255) NOT NULL UNIQUE,
    CONSTRAINT FOREIGN KEY (prof_id) REFERENCES employee(empl_id),
    CONSTRAINT FOREIGN KEY (privt_id) REFERENCES employee(empl_id)
    
);

CREATE TABLE orders(

    ord_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ord_empl_id INT NOT NULL , 
    ord_cli_id INT NOT NULL , 
    ord_date DATETIME NOT NULL ,
    CONSTRAINT FOREIGN KEY (ord_cli_id) REFERENCES client(cli_id),
    CONSTRAINT FOREIGN KEY (ord_empl_id) REFERENCES employee(empl_id) 
);

CREATE TABLE ord_details_srvPro(
    ord_num INT ,
    srvPro_num INT NOT NULL  ,
    srv_list TEXT ,
    pro_quantity INT ,
    total_price DECIMAL(6,2) NOT NULL,
    b_date DATETIME NOT NULL ,
    discount DECIMAL(6,2) ,
    CONSTRAINT FOREIGN KEY (ord_num) REFERENCES orders(ord_id),
    CONSTRAINT FOREIGN KEY (srvPro_num) REFERENCES services_products(srvPro_id)

);
CREATE TABLE ord_details_car(
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


