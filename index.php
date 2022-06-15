<?php
require_once './Database/connect.php';
$bd = new Bd();

require './functions/notification.php';
$notification = new Notification();

$page = (isset($_GET['page'])) ? htmlspecialchars($_GET['page']): 'login';

    if(!session_id()){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <?php
    require './pages/header.php';

    if ($page === 'productlist') {
        require './pages/articleList.php';
    } elseif ($page === 'account') {
        // compte client
        require './pages/gestCompte.php';
    } elseif ($page === 'checkout') {
        // panier
        require './pages/panier.php';
    } elseif ($page === 'login') {
        // page de connextion
        require './pages/connex.php';
    }elseif ($page === 'newAcc') {
        // page de connextion
        require './pages/newAcc.php';
    }elseif ($page === 'addProduct'){
        require './functions/addProduct.php';
    }elseif ($page === 'removeProduct'){
        require './functions/delProduct.php';
    }
    
    ?>
<footer>
    <p>copyright 2022 Cyrus Valette</p>
</footer>
</body>

</html>