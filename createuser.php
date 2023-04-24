<?php require_once 'includes/php/actions.php';


$dbh = getDB();

$firstname = 'Jelte';
$lastname = 'Cost';
$username = 'j.cost@cadicto.nl';
$password = 'Kaas123';

$sql = "INSERT into users (first_name, last_name, username, password) values (:firstname, :lastname, :username, :password)";
$stmt = $dbh->prepare($sql);
$stmt->execute(['firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT)]);


// print the sql
echo $sql;

?>


