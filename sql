Host = localhost // or ip server
username = root // or jon
password = hiroshima
port = 3306

mysql -u root -p hiroshima 
mysql -u john -p hiroshima

use webapp
  
DELETE FROM `users` WHERE 1;

INSERT INTO `users`(`id`, `username`, `password`) VALUES ('1','or=1','bana');
INSERT INTO `users`(`id`, `username`, `password`) VALUES ('1','or=1','root');
INSERT INTO `users`(`id`, `username`, `password`) VALUES ('1','root','root');
