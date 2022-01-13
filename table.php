<?php

$dsn = 'mysql:host=sql6.freesqldatabase.com;dbname=sql6465201';

$con = new PDO($dsn, 'sql6465201', 'u1R4fKiMrH');
$con->query("create table booklists (
  id int(11) auto_increment primary key,
  title varchar(30) not null,
  author varchar(30) not null,
  available varchar(30) not null,
  pages int(10) not null,
  isbn int(10) not null
)");