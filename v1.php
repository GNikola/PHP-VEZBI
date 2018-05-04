<?php 

$username = 'root';
$password = '';
$host = '127.0.0.1';
$dbname = 'blog';

$dsn = 'mysql:host='.$host.';dbname='.$dbname;

$db = new PDO($dsn, $username, $password);

$sql = 'select * from posts'; // SQL
$query = $db->query($sql); // SQL
$query->execute(); // RABOTA NA SERVEROT
$res = $query->fetchAll(PDO::FETCH_ASSOC); // VRATENI PODATOCI


$sql_add_post = "insert into posts (title, content) values (:title, :content)"; // SQL
$add_p = $db->prepare($sql_add_post); // SQL
$add_p->bindValue(':title', 'Lesi se vraka'); //SQL
$add_p->bindValue(':content', 'Av av av...'); //SQL
$add_p->execute(); //  WORK

$res_p = $add_p->fetchAll(PDO::FETCH_ASSOC); // DATA

?>