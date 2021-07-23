
--exercice 1
CREATE VIEW  catalogue_pro AS SELECT pro_id,pro_ref,pro_name,cat_id,cat_name 
from products join categories ON cat_id = pro_cat_id; 

--exercice 2

CREATE procedure facture (p_ord_num)
SELECT ord_id,ord_order_date,pro_name,cat_name, from orders join orders_details ON ord_id = ode_ord_id