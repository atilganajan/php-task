<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frontend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="">
        <button class="btn btn-danger" id="logoutBtn">Logout</button>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {

        $("#logoutBtn").on("click", function () {

            $.ajax({
                type: "GET",
                url: "logout.php",
                dataType: "json",
            }).done((response) => {
                window.location.href = "home.php";
            }).fail((err) => {
                console.log(err);
                alert("unexpected error");
            });

        })
    })

</script>
</body>
</html>