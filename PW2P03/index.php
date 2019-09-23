<?php
include_once 'db_function/genre_func.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Yosmart Hariandja (1772022)">
    <meta name="description" content="PHP Navigation and PHP Data Object (PDO)">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemrograman Web 2</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
</head>
<body>
<div class="page">
    <header>
        <h2>PHP Hospital PDO</h2>
    </header>
    <nav>
        <ul>
            <li><a href="?menu=hm">Home</a></li>
            <li><a href="?menu=at">About</a></li>
            <li><a href="?menu=in">Insurance</a></li>
            <li><a href="?menu=pt">Patient</a></li>
        </ul>
    </nav>
    <main>
        <?php
        $targetMenu = filter_input(INPUT_GET, 'menu');
        switch ($targetMenu) {
            case 'hm';
                include_once 'view/Home.php';
                break;
            case 'at';
                include_once 'view/About.php';
                break;
            case 'in';
                include_once 'view/Insurance.php';
                break;
            case 'pt';
                include_once 'view/Patient.php';
                break;
            default;
                include_once 'view/Home.php';
        }
        ?>
    </main>
    <footer>
        Pemrograman Web 2 &copy;2019
    </footer>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</html>
