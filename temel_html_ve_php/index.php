<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Temel HTML ve PHP</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

</head>
<body>

<?php

$host = "localhost";
$dbname = "laravel";
$user = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT users.id, users.first_name, users.last_name,
            users.address, users.phone, users.email, users.date_of_birth, departments.name as department_name  FROM users
            LEFT JOIN departments ON users.department_id = departments.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Connection Error: " . $e->getMessage();
    die();
}

$conn = null;
?>



<div class="container p-5">
    <div class="text-center">
        <h2>Temel HTML ve PHP</h2>
        <hr>
    </div>
    <table id='userTable' class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Department</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Date of Birth</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user) {
            echo "
            <tr>
                <td>{$user['id']}</td>
                <td>{$user['department_name']}</td>
                <td>{$user['first_name']}</td>
                <td>{$user['last_name']}</td>
                <td>{$user['address']}</td>
                <td>{$user['phone']}</td>
                <td>{$user['email']}</td>
                <td>{$user['date_of_birth']}</td>
            </tr>
        ";
        }
        ?>

        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#userTable').DataTable();
    });
</script>
</body>
</html>
