<?php

$host = "localhost";
$dbname = "laravel";
$user = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    $sql = "SELECT urun_id, grup_adi, urun_adi, birimi, guncel_stok FROM products";

    $products = $conn->query($sql);


} catch (PDOException $e) {
    echo "Connection Error: " . $e->getMessage();
    die();
}

$conn = null;
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ek Kısımlar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="text-center my-4">
        <h2>Ek Kısımlar</h2>
    </div>
    <table class="table">
        <thead>
        <tr>
            <td>Ürün Id</td>
            <td>Grup Adı</td>
            <td>Ürün Adı</td>
            <td>Birimi</td>
            <td>Güncel Stok</td>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($products as $product) {
            echo "
             <tr>
                <td>{$product["urun_id"]}</td>
                <td>{$product["grup_adi"]}</td>
                <td>{$product["urun_adi"]}</td>
                <td>{$product["birimi"]}</td>
                <td>{$product["guncel_stok"]}</td>
             </tr>
        ";
        }

        ?>

        </tbody>
    </table>

</div>


</body>
</html>