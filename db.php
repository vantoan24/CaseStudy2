<?php
//THONG TIN CSDL
$host = 'localhost' ;
$username = 'root';
$password = '';
$database = 'inotes' ;

//KẾT NỐI CSDL
global $connect;
$connect = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);