<?php
  $dsn = 'mysql:dbname=oneline_bbs2;host=localhost'; 
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password); 
  $dbh->query('SET NAMES utf8');
?>