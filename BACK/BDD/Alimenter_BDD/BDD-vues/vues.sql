--Exercice1

1- CREATE VIEW v_liste_hotel_station AS SELECT hot_nom,sta_nom 
FROM hotel JOIN station ON sta_id = hot_sta_id;

2-CREATE VIEW v_hot_chambre_ AS SELECT hot_nom,cha_numero
 FROM hotel JOIN chambre ON hot_id = cha_hot_id;

3-CREATE VIEW v_résarvations_cliNom AS SELECT res_id,cli_nom
 FROM reservation JOIN client ON cli_id = res_cli_id;

4-CREATE VIEW v_cham_hotNom_staNom AS SELECT cha_numero,hot_nom,sta_nom 
FROM chambre JOIN hotel ON cha_hot_id = hot_id 
JOIN station ON sta_id = hot_sta_id;

5- CREATE VIEW v_resarvations_cliNom_hotNom AS 
SELECT res_id,cli_nom,hot_nom 
FROM hotel JOIN chambre ON hot_id = cha_hot_id 
JOIN  reservation ON cha_id = res_cha_id 
JOIN client ON cli_id = res_cli_id;


--Exercice 2

1- CREATE VIEW v_Details AS SELECT pro_ref, SUM(ode_quantity) AS QteTot ,SUM(ode_unit_price * ode_quantity) AS PrixTot 
from products JOIN orders_details ON pro_id = ode_pro_id
GROUP BY pro_ref;

2- CREATE VIEW v_Ventes_Zoom AS SELECT *  
from orders_details JOIN products ON pro_id = ode_pro_id
 WHERE pro_ref = "zoom";