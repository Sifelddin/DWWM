
--exercice 1
--Vues


CREATE VIEW  catalogue_pro AS SELECT pro_id,pro_ref,pro_name,cat_id,cat_name 
from products join categories ON cat_id = pro_cat_id; 


---------------------------------------------------------------------------


--exercice 2
--Procédures stockées


DELIMITER $$
DROP PROCEDURE IF EXISTS facture $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `facture`(INOUT `p_ord_num` INT UNSIGNED,  OUT `p_order_date` DATE,OUT `p_pro_total` INT, OUT `p_units_price` DECIMAL(7,2),  OUT `p_total_quantity` INT, OUT `p_total_discount` DECIMAL,OUT `p_TOTAL` FLOAT UNSIGNED)
IF (SELECT COUNT(ode_ord_id) from orders_details WHERE ode_ord_id = p_ord_num)  <= 1 THEN

SELECT ord_id AS order_num,pro_name AS product ,ode_unit_price AS unit_price,ode_quantity AS quantity,ode_discount AS discount ,ord_order_date AS order_date,ord_status AS order_status,SUM( ode_unit_price*ode_quantity - ode_discount) as total from products JOIN orders_details ON pro_id = ode_pro_id JOIN orders ON ode_ord_id = ord_id
WHERE ord_id = p_ord_num
GROUP BY ord_id,pro_name,ord_order_date,ord_status,ode_unit_price,ode_quantity,ode_discount;
ELSE 

SELECT SUM(ode_discount) ,SUM(ode_quantity), SUM(ode_unit_price), COUNT(ode_unit_price),ord_order_date ,ode_ord_id, SUM(ode_unit_price * ode_quantity - ode_discount) INTO
 p_total_discount,p_total_quantity,p_units_price,p_pro_total, p_order_date,p_ord_num, p_TOTAL  FROM orders_details,orders WHERE
ord_id = ode_ord_id  AND ode_ord_id = p_ord_num;
 END IF;
DELIMITER ;



--exécuté la procedure
--commande 2
SET @p0='2'; CALL `facture`(@p0, @p1, @p2, @p3, @p4, @p5, @p6); SELECT @p0 AS `p_ord_num`, @p1 AS `p_order_date`, @p2 AS `p_pro_total`, @p3 AS `p_units_price`, @p4 AS `p_total_quantity`, @p5 AS `p_total_discount`, @p6 AS `p_TOTAL`;

--commande 53
SET @p0='53'; CALL `facture`(@p0, @p1, @p2, @p3, @p4, @p5, @p6); SELECT @p0 AS `order_number`, @p1 AS `order_date`, @p2 AS `products_sum`, @p3 AS `units_price_sum`, @p4 AS `total_quantity`, @p5 AS `total_discount`, @p6 AS `FINAL_TOTAL`;

---------------------------------------------------------------------------


--EXERCICE 3
--Triggers

CREATE TABLE `commander_articles` (
  `codArt` int(11) unsigned NOT NULL,
  `qte` int(11) NOT NULL,
  `date_jour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `pro_foreign` (`codArt`),
  CONSTRAINT `pro_foreign` FOREIGN KEY (`codArt`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8



 DROP TRIGGER IF EXISTS after_products_update 
 DELIMITER $$
 CREATE trigger after_products_update AFTER UPDATE on products for each row 

begin

IF NEW.pro_stock <= old.pro_stock_alert AND
 (SELECT codart from commander_articles join products on codart = pro_id WHERE codart = new.pro_id) IS NULL THEN


INSERT INTO commander_articles (codart,qte) 
VALUES (old.pro_id, old.pro_stock_alert - NEW.pro_stock );


ELSE IF NEW.pro_stock > old.pro_stock_alert AND 
(SELECT codart from commander_articles join products on codart = pro_id WHERE codart = new.pro_id) IS NOT NULL THEN

UPDATE commander_articles SET qte = 0 WHERE codart = new.pro_id;


ELSE
UPDATE commander_articles SET qte = old.pro_stock_alert - NEW.pro_stock WHERE codart = new.pro_id ;
END IF;
END IF;
END$$
DELIMITER ;



-----------------------------------------------------------------------------------------------------
--EXERCICE 4 
--Transactions
-- create user
CREATE USER 'retraite'@'%' IDENTIFIED BY '';
GRANT SELECT , INSERT ON gescom_afpa.posts to `retraite`

--ajouter un champ qui contient le nom d'employé qui va sortir en retraite pour  dans la mème ligne avec son ancien poste
--à chaque fois un employé sort en retraite on fait update sur la ligne ou se trouve son ancien poste pour rajouter son nom

START TRANSACTION;
ALTER TABLE `posts` ADD `ancien_coll` VARCHAR(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
update posts SET ancien_coll = 'HANAH' WHERE pos_id = 1 limit  1 ;
COMMIT;


