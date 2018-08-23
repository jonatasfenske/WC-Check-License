<?php
/**
 * Created by PhpStorm.
 * User: jonatasfenske
 * Date: 23/08/2018
 * Time: 11:45
 */
require __DIR__ . '/vendor/autoload.php';

$checkLicense = new Source\Helpers\CheckLicense;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WC Check License</title>
    <style type="text/css">
        .box {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
            font-size: 1.2em;
            font-weight: bold;
        }

        .box div {
            z-index: 100;
            max-width: 600px;
            width: 70%;
            padding: 20px 10px;
            border-radius: 5px;
            text-align: center;px;
            width: 70%;
        }
        .success{
            background-color: green;
            color:#FFF;
        }
        .error{
            background-color: red;
            color:#FFF;
        }
    </style>
</head>
<body>
<section class="box">
    <?php
    if ($checkLicense->verifyLicense('02132223106')) {
        echo '<div class="success">&#9935 É Licenciado</div>';
    } else {
        echo '<div class="error">&#9932 Não é Licenciado</div>';
    }
    ?>
</section>
</body>
</html>