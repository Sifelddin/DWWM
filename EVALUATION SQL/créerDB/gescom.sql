

DROP DATABASE IF EXISTS eval_gescom ;

CREATE DATABASE eval_gescom /*!40100 DEFAULT CHARACTER SET utf8 */;

USE eval_gescom ;

CREATE TABLE category(
    cat_id INT (10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cat_name VARCHAR (90) NOT NULL UNIQUE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE countries(
    cou_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cou_name VARCHAR(50) NOT NULL UNIQUE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE shops_empl (
    shop_id INT UNSIGNED NOT NULL PRIMARY KEY,
    shop_name VARCHAR (50) NOT NULL,
    shop_address VARCHAR (255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE post (
    post_id INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_name VARCHAR (50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


create TABLE subcategory(
   subcat_id INT (10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   subcat_name varchar(90) NOT NULL,
   subcat_cat_id INT (10) UNSIGNED NOT NULL ,
   CONSTRAINT FOREIGN KEY (subcat_cat_id) REFERENCES category(cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE suppliers(
  sup_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  sup_name  varchar(90) NOT NULL,  
  sup_city varchar(50) NOT NULL,
  sup_address varchar(150) NOT NULL,
  sup_zipcode varchar(5)  NOT NULL,
  sup_phone varchar(15)  NOT NULL,
  sup_mail varchar(255) NOT NULL,
  sup_cou_id INT UNSIGNED NOT NULL,
  sup_commercial VARCHAR (255) NOT NULL UNIQUE,
  sup_email VARCHAR (255) NOT NULL UNIQUE,
  CONSTRAINT FOREIGN KEY (sup_cou_id) REFERENCES countries (cou_id)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE client(
    cli_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    cli_f_name VARCHAR (50) NOT NULL,
    cli_la_name VARCHAR (50) NOT NULL,
    cli_address VARCHAR (255) NOT NULL,
    cli_email VARCHAR (255) NOT NULL UNIQUE,
    cli_ph_num int(10) UNSIGNED NOT NULL,
    cli_pw VARCHAR (255) NOT NULL,
    cli_d_add DATETIME NOT NULL,
    cli_d_modif DATETIME ,
    cli_cou_id INT UNSIGNED NOT NULL,
    CONSTRAINT FOREIGN KEY (cli_cou_id) REFERENCES countries (cou_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE orders(
    ord_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    ord_date DATETIME NOT NULL,
    ord_payment DATETIME NOT NULL,
    ord_d_ship DATE ,
    ord_d_reception DATE,
    ord_status VARCHAR(25),
    ord_cli_id INT UNSIGNED NOT NULL,
    CONSTRAINT FOREIGN KEY (ord_cli_id) REFERENCES client(cli_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE products (
    pro_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pro_price DECIMAL (8,2) NOT NULL ,
    pro_inter_ref VARCHAR (50),
    pro_EAN varchar (20),
    pro_phy_stk INT (10) UNSIGNED NOT NULL,
    pro_alert_stk INT (10) UNSIGNED NOT NULL,
    pro_name VARCHAR (20) NOT NULL UNIQUE,
    pro_descreption TEXT NOT NULL ,
    pro_add_date DATE NOT NULL,
    pro_midif DATE ,
    pro_picture VARCHAR (70) NOT NULL,
    pro_cat_id INT UNSIGNED NOT NULL,
    pro_sup_id INT UNSIGNED NOT NULL,
    CONSTRAINT FOREIGN KEY (pro_cat_id) REFERENCES subcategory(subcat_id),
    CONSTRAINT FOREIGN KEY (pro_sup_id) REFERENCES suppliers(sup_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE order_details(
    ord_details_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ord_details_discount DECIMAL (8,2) NOT NULL,
    ord_details_quantity INT (10) UNSIGNED NOT NULL,
    unit_price DECIMAL (8,2) NOT NULL,
    ord_ord_id INT UNSIGNED NOT null,
    ord_pro_id INT UNSIGNED NOT null,
    CONSTRAINT FOREIGN KEY (ord_ord_id) REFERENCES orders(ord_id),
    CONSTRAINT FOREIGN KEY (ord_pro_id) REFERENCES products(pro_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE employees(
    empl_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    empl_post_id INT (10) UNSIGNED NOT NULL,
    empl_superior_id INT UNSIGNED NOT NULL  ,
    empl_shop_id INT UNSIGNED NOT NULL ,
    empl_f_name VARCHAR(20) NOT NULL, 
    empl_la_name VARCHAR(20) NOT NULL, 
    empl_ph_num VARCHAR(10) NOT NULL,
    empl_email VARCHAR (50) NOT NULL,
    empl_address VARCHAR (255) NOT NULL,
    empl_entre_d DATE NOT NULL,
    empl_wage_y DECIMAL(8,2),
    empl_gender char(1) NOT NULL,
    empl_child_num tinyint(2) UNSIGNED NOT NULL,
    CONSTRAINT FOREIGN KEY (empl_superior_id) REFERENCES employees(empl_id),
    CONSTRAINT FOREIGN KEY (empl_post_id) REFERENCES post(post_id),
    CONSTRAINT FOREIGN KEY (empl_shop_id) REFERENCES shops_empl(shop_id)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

