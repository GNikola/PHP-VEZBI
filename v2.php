<?php 

// USER VALIDATION

$EMAIL = 'pero@perovski.com';
$PASSWORD = 'tajna123';

$username = 'root';
$password = '';
$host = '127.0.0.1';
$dbname = 'blog';

$dsn = 'mysql:host='.$host.';dbname='.$dbname;

$db = new PDO($dsn, $username, $password);

$sql = 'select id, email, password from users where email = :email and password = :password';
$query = $db->prepare($sql); // SQL

$query->bindValue(':email', $EMAIL); // SQL
$query->bindValue(':password', $PASSWORD); // SQL

$query->execute(); // WORK

$user = $query->fetchALL(PDO::FETCH_ASSOC);

print_r($user);


// CRUD CREATE READ UPDATE AND DELETE
// za site kategorii
/// PO 4 KVERIJA ZA SEKOJA TABELA  
?>