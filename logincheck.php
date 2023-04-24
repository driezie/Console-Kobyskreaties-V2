<?php require_once 'includes/php/actions.php';

$login_data = $_POST;


$dbh = getDB();

$sql = "SELECT * FROM users WHERE username = :email";
$stmt = $dbh->prepare($sql);
$stmt->execute(['email' => $login_data['email']]);
$user = $stmt->fetch();
session_start();
echo 'test';

if ($user) {
    if (password_verify($login_data['password'], $user['password'])) {
        // save first name and last name in session
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['user_id'] = $user['id'];

        header('Location: ' . $main_url . 'dashboard/');
    } else {
        $_SESSION['error'] = 'Onjuiste e-mail of wachtwoord.';
        header('Location: ' . $main_url . 'login.php');
    }
} else {
    $_SESSION['error'] = 'Onjuiste e-mail of wachtwoord.';
    header('Location: ' . $main_url . 'login.php');
}

echo 'test';


