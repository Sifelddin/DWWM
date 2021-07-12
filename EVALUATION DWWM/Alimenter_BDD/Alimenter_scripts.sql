


-- Exercice 5
-- Créez des scripts d'alimentation pour les autres tables.
-- Les valeurs devront bien sûr respecter les problématiques d'intégrité référentielle.


INSERT INTO categories (cat_name, cat_parent_id) VALUES

('Outillage manuel',1),('Outillage mécanique',2),('Plants et semis',NULL),('Arbres et arbustes',4),('Pots et accessoires',NULL);

INSERT INTO posts (pos_libelle) VALUES ('particulier'), ('professionnel');

INSERT INTO employees (emp_superior_id,emp_pos_id,emp_lastname,emp_firstname,emp_address,emp_zipcode,emp_city,emp_mail,emp_phone,emp_salary,emp_enter_date,emp_gender,emp_children)
VALUES (NULL,1,'quincy','Doe','78 rue du nord', '78500','newcity','Doe@gmail.com',0775298254,3500,'2015/03/01','h',2),
 (1,2,'larson','joe','17 rue du sud', '16500','oldcity','joe@gmail.com',0775300254,3500,'2014/03/01','h',0);



INSERT INTO suppliers(sup_name,sup_city,sup_countries_id,sup_address,sup_zipcode,sup_contact,sup_phone,sup_mail)
VALUES
 ('pers','rouen','FR','10 rue to', '76000','contact','0667772323','pers@yahoo.fr'),
 ('pers2','dodo','AL','10 rue toto', '76000','contact','0667772323','pers2@yahoo.fr'),
 ('pers3','batna','NI','10 rue zozo', '76000','contact','0667772323','pers3@gouv.fr'),
 ('pers4','newYork','AM','33 rue bon', '76000','contact','0667772323','pers4@gmail.com');

 INSERT INTO customers (cus_lastname,cus_firstname,cus_address,cus_zipcode,cus_city,cus_countries_id,cus_mail,cus_phone,cus_password,cus_add_date,cus_update_date)
 VALUES
  ('harry','way','28 route nord', '23000','tixas','AM','harry@gmail.com',0663102545,'passwordunique','2013/04/01 00', NULL),
  ('faride','sogood','08 route nord', '23000','tixas','AM','harry@gmail.com',0665550045,'passwordunique','2011/03/01 00', NULL),
  ('sam','good','03 rue nord', '23000','tixas','AM','harry@gmail.com',0676662245,'passwordunique','2010/01/01 00', NULL);

INSERT INTO orders (ord_order_date,ord_payment_date,ord_ship_date,ord_reception_date,ord_status,ord_cus_id)
VALUES ('2020/10/03',NULL,NULL,NULL,'urgent',1),('2021/10/03','2020/10/03',NULL,NULL,'urgent',2),('2021/01/13',NULL,'2020/10/03',NULL,'urgent',3);