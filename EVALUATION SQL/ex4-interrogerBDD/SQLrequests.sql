
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