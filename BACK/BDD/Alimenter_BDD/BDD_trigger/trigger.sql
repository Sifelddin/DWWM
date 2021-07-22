
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



 --
 DELIMITER $$
 CREATE trigger after_products_update 
AFTER UPDATE on products for each row 
begin

IF new.pro_stock < new.pro_stock_alert THEN
INSERT INTO commander_articles (codArt,qte) 
VALUES (pro_id, new.pro_stock - new.pro_stock_alert );
END IF;
END$$
DELIMITER ;