
--Exercice 1
--Q1. Afficher dans l'ordre alphabétique et sur une seule colonne, les noms et prénoms des employés qui ont des enfants. Présenter d'abord ceux qui en ont le plus.

SELECT CONCAT(emp_lastname,' ',emp_firstname ) AS employé, emp_children AS NB_enfants 
from employees
 ORDER BY NB_enfants DESC, employé ASC;


 --Exercice 2
-- Q2. Y-a-t-il des clients étrangers ? Afficher leur nom, prénom et pays de résidence.

SELECT cus_lastname , cus_firstname , cus_countries_id from customers where cus_countries_id != 'FR';

--Exercice 3
--Q3. Afficher par ordre alphabétique les villes de résidence des clients ainsi que le code (ou le nom) du pays.

SELECT cus_city , cus_countries_id,cou_name FROM customers JOIN countries ON cus_countries_id = cou_id order by cus_city asc;

--Exercice 4
--Q4. Afficher le nom des clients dont les fiches ont été modifiées

SELECT cus_lastname , cus_update_date FROM customers WHERE cus_update_date != null or cus_update_date != "";

--Exercice 5
--Q5. La commerciale Coco Merce veut consulter la fiche d'un client, mais la seule chose dont elle se souvienne est qu'il habite une ville genre 'divos'. Pouvez-vous l'aider ?


SELECT * FROM customers WHERE cus_city LIKE '%divos%';

--Exercice 6 
--Q6. Quel est le produit dont le prix de vente est le moins cher ? Afficher le prix, l'id et le nom du produit.

SELECT pro_id,pro_name,pro_price
 FROM products
  WHERE pro_price IN (SELECT MIN(pro_price) FROM products);

--Exercice 7
-- Q7. Lister les produits qui n'ont jamais été vendus
SELECT DISTINCT pro_id , pro_ref, pro_name 
FROM products
 WHERE products.pro_id NOT IN ( SELECT orders_details.ode_pro_id FROM orders_details);

--Exercice 8 
--Q8. Afficher les produits commandés par Madame Pikatchien.

SELECT pro_id,pro_ref,pro_color,pro_name,cus_id,cus_lastname,ord_id,ode_id
 from products JOIN orders_details ON pro_id = ode_pro_id 
 JOIN orders ON ord_id = ode_ord_id 
 JOIN customers ON ord_cus_id = cus_id 
WHERE cus_lastname = 'Pikatchien';


--Exercice 9
--Q9. Afficher le catalogue des produits par catégorie, le nom des produits et de la catégorie doivent être affichés.

SELECT cat_id,cat_name,pro_name from categories join products ON cat_id = pro_cat_id ORDER BY cat_name ASC;


--Exercice 10 
--Q10. Afficher l'organigramme du magasin de Compiègne Afficher le nom et prénom des employés, classés par ordre alphabétique, ainsi que celui de leur supérieur hiérarchique (et éventuellement leurs postes respectifs, si vous y parvenez).

SELECT CONCAT (t1.emp_lastname,' ', t1.emp_firstname) AS employé,p1.pos_libelle,CONCAT (t2.emp_lastname,' ', t2.emp_firstname) AS supérieur, p2.pos_libelle
from employees as t1
JOIN employees as t2 on t1.emp_superior_id=t2.emp_id
JOIN posts as p1 ON p1.pos_id = t1.emp_pos_id
JOIN posts as p2 ON p2.pos_id = t2.emp_pos_id
ORDER BY employé asc;

--Exercice 11
--Q11. Quel produit a été vendu avec la remise la plus élevée ? Afficherle numéro et le nom du produit, le numéro de commande, le numéro de ligne de commande, et le montant de la remise.

SELECT pro_id,pro_name,ord_id,ode_id , ode_discount, (ode_discount/100 * pro_price) AS montant_remise  from products JOIN orders_details ON pro_id = ode_pro_id JOIN orders ON ode_ord_id = ord_id
WHERE orders_details.ode_discount IN (SELECT MAX(ode_discount) FROM orders_details)
GROUP by pro_id,pro_name,ord_id,ode_id,montant_remise;

--Exercice 12
--Q12. Combien y-a-t-il de clients canadiens ? Afficher dans une colonne intitulée 'Nb clients Canada'

SELECT Count(cus_id) FROM customers JOIN countries ON cou_id = cus_countries_id WHERE cou_name = 'Canada';

--Exercice 13
--Q13. Afficher le détail des commandes de 2020.

SELECT ode_id,ode_unit_price,ode_discount,ode_quantity,ode_ord_id,ode_pro_id,ord_order_date
 from orders_details JOIN orders ON ord_id = ode_ord_id 
 WHERE year(ord_order_date) = 2020 order BY ode_ord_id ASC;

--Exercice 14
--Q14. Afficher les coordonnées des fournisseurs pour lesquels des commandes ont été passées.

SELECT DISTINCT sup_id,sup_name,sup_city,sup_countries_id,sup_address,sup_zipcode,sup_contact,sup_phone,sup_mail
FROM suppliers JOIN products ON sup_id = pro_sup_id
 WHERE products.pro_id  IN ( SELECT orders_details.ode_pro_id FROM orders_details);

--Exercice 15 

--Q15. Quel est le chiffre d'affaires de 2020 ?

SELECT SUM((ode_unit_price * ode_quantity) * (1 - ode_discount/100))
 FROM orders_details JOIN orders ON ord_id =  ode_ord_id 
 WHERE year(ord_order_date) = 2020 ; 

--Exercice 16
--Q16. Lister le total de chaque commande par total décroissant. Afficher le numéro de commande, la date, le total et le nom du client).

SELECT ord_id,cus_lastname,ord_order_date,ode_quantity, (ode_quantity * ode_unit_price) as Total 
from customers JOIN orders ON cus_id = ord_cus_id 
JOIN orders_details ON ord_id = ode_ord_id
ORDER BY  Total desc ;

--Exercice 17
--Q17. Quel est le montant du panier moyen ?

SELECT SUM((ode_unit_price * ode_quantity) * (1 - ode_discount/100))/ count(ord_id)
from orders_details JOIN orders ON ord_id = ode_ord_id ;


--Les besoins de mise à jour
--Q18. La version 2020 du produit barb004 s'appelle désormais Camper et, bonne nouvelle, son prix subit une baisse de 10%. Mettre à jour la fiche de ce produit.
UPDATE products SET pro_price = pro_price * 90/100 , pro_ref = 'Camper' , pro_update_date = '2020-01-01' WHERE pro_ref = 'barb004';

--Q19. L'inflation en France l'année dernière a été de 1,1%. Appliquer cette augmentation à la gamme de parasols.

UPDATE products JOIN categories ON cat_id = pro_cat_id SET pro_price = pro_price + pro_price * 1.1/100 WHERE cat_name = 'Parasols';


--Q20. Supprimer les produits non vendus de la catégorie "Tondeuses électriques". Vous devez utiliser une sous-requête sans indiquer de valeurs de clés.

DELETE products FROM products JOIN categories ON cat_id = pro_cat_id 
WHERE products.pro_id NOT IN ( SELECT orders_details.ode_pro_id FROM orders_details) AND cat_name = 'Tondeuses électriques';