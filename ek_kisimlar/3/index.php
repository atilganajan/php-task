<?php

$host = "localhost";
$dbname = "laravel";
$user = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

} catch (PDOException $e) {
    echo "Connection Error: " . $e->getMessage();
    die();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["kullanici_adi"];
    $password = $_POST["sifre"];

    $query = "SELECT * FROM users WHERE kullanici_adi = :kullanici_adi";
    $statement = $conn->prepare($query);
    $statement->bindParam(':kullanici_adi', $kullanici_adi);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['sifre'])) {
        $_SESSION["sifre"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid kullanici adi or sifre.";
    }

}
?>