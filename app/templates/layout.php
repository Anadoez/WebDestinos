<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/main.js"></script>
    <link rel="icon" href="images/logo.png" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo 'scss/'.Config::$mvc_vis_css ?>" />
    <title>Web Destinos</title>
</head>
<body>
<div class="layout1 ">

<?php echo $contenido ?>

<div class="row h-100 justify-content-md-center align-items-center">
    <div class="anuncio"></div>
</div>
<footer>
    <div>
        <ul class="foot-links text-center">
            <li><a class="text-decoration-none" href="index.php?ctl=privacyP">Política de privacidad</a></li>
            <li><a class="text-decoration-none" href="index.php?ctl=cookie">Política de Cookies</a></li>
        </ul>
    </div>
    <div>
        <i>&copy;IES Abastos 2021</i>
    </div>
</footer>
</div>
<script src="jquery/jquery-3.3.1.js"></script>
<script src="bootstrap/bootstrap.js"></script>
</body>
</html>