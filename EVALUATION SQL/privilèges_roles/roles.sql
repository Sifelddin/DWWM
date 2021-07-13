

create USER 'util1'@'localhost'  IDENTIFIED BY '';
create USER 'util2'@'localhost'  IDENTIFIED BY '';
create USER 'util3'@'localhost'  IDENTIFIED BY '';

GRANT ALL PRIVILEGES ON gescom_afpa.* TO 'util1'@'localhost';
GRANT SELECT ON gescom_afpa.* TO 'util2'@'localhost';
GRANT SELECT ON gescom_afpa.suppliers TO 'util3'@'localhost';
