
-- sauvegarde explication
--1 d'abord créer un répertoire ou je vais loger mes sauvegardes , sur mon poste le nom de la répertoire est 'backup'
--2 garder le chemin vers le répertoire , sur mon post 'C:\backup'
--3 ouvrir le terminale de l'Aragon sur mon poste pour saisir 'sauvgarde commande'
--4 on insère le nom de user  ' sur mon poste est "root"'  
-- le password si il existe 'sur mon poste il n'existe pas'
-- le nom de la BDD  
-- le chemin  'C:\backup'  
-- le nom de fichier qui va contenir le script de la BDD sauvgardée



--sauvgarde commande  pour la BDD eso1 dans la réparoire backup

 mysqldump --user=root --databases eso1 > C:\backup\backup_eso1.sql




 --ouvrir le terminale de l'Aragon sur mon poste pour saisir 'restauration commande'

--restauration commande de BDD  gescom_afpa

 mysql --user=root  < C:\Backup\backup_gescom_afpa.sql


-- sur mon poste la répertoire  'backup' contient :

backup_gescom_afpa.sql
backup_eso1.sql