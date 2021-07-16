

CREATE USER IF NOT EXISTS 'groupe_marketing'@'localhost'  IDENTIFIED BY '';

GRANT INSERT, DELETE,UPDATE ON gescom_afpa.products TO 'groupe_marketing'@'localhost';
GRANT INSERT, DELETE, UPDATE ON gescom_afpa.categories TO 'groupe_marketing'@'localhost';
GRANT SELECT ON gescom_afpa.orders TO 'groupe_marketing'@'localhost';
GRANT SELECT ON gescom_afpa.orders_details TO 'groupe_marketing'@'localhost';
GRANT SELECT ON gescom_afpa.customers TO 'groupe_marketing'@'localhost';


