--Phase 1 - Bien débuter avec les déclencheurs
--insert trigger
CREATE DEFINER=`root`@`localhost` TRIGGER `insert_total`
 AFTER INSERT ON `lignedecommande` FOR EACH ROW UPDATE commande 
 SET total = (SELECT sum((prix*quantite)- commande.remise) 
FROM lignedecommande  WHERE id = id_commande)  
 WHERE id = new.id_commande


--delete trigger
CREATE DEFINER=`root`@`localhost` TRIGGER `delete_total`
 AFTER DELETE ON `lignedecommande` FOR EACH ROW UPDATE commande 
 SET total = (SELECT sum((prix*quantite)- commande.remise) 
FROM lignedecommande  WHERE id = id_commande)  
 WHERE id = old.id_commande
--update trigger
CREATE DEFINER=`root`@`localhost` TRIGGER `update_total`
 AFTER update ON `lignedecommande` FOR EACH ROW UPDATE commande 
 SET total = (SELECT sum((prix*quantite)- commande.remise) 
FROM lignedecommande  WHERE id = id_commande)  
 WHERE id = old.id_commande

 CREATE TRIGGER after_products_update after update on products 
 SET qte = qte + 1 from commander_articles 



 --Phase 2 - Les déclencheurs
 DROP TRIGGER IF EXISTS after_products_update 
 DELIMITER $$
 CREATE trigger after_products_update AFTER UPDATE on products for each row 

begin

IF NEW.pro_stock < old.pro_stock_alert THEN
IF (SELECT codart from commander_articles join products on codart = pro_id WHERE codart = new.pro_id) IS NULL THEN
INSERT INTO commander_articles (codart,qte) 
VALUES (old.pro_id, old.pro_stock_alert - NEW.pro_stock );
ELSE 
UPDATE commander_articles SET qte = old.pro_stock_alert - NEW.pro_stock ;
END IF;
END IF;
END$$
DELIMITER ;