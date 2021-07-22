

-- 1 Créez la procédure stockée Lst_Suppliers correspondant à la requête afficher 
--le nom des fournisseurs pour lesquels une commande a été passée.
CREATE PROCEDURE Lst_Suppliers ()
SELECT DISTINCT  sup_name
FROM products JOIN suppliers ON sup_id = pro_sup_id
 WHERE products.pro_id  IN ( SELECT orders_details.ode_pro_id FROM orders_details);
 CALL Lst_Suppliers();

 --Exercice 2 : création d'une procédure stockée avec un paramètre en entrée
CREATE PROCEDURE Lst_Rush_Orders(IN p_com_libelle VARCHAR(50))
SELECT * from orders WHERE ord_status = p_com_libelle;
CALL Lst_Rush_Orders("Commande urgente");


--Exercice 3 : création d'une procédure stockée avec plusieurs paramètres

CREATE PROCEDURE CA_Supplier (IN p_fourni_code INT,IN p_an_entrer year)
SELECT SUM(pro_price * pro_stock) AS CA
from products JOIN suppliers ON sup_id = pro_sup_id
WHERE sup_id = p_fourni_code AND year(pro_add_date) = p_an_entrer ;

CALL CA_Supplier (1,2018);