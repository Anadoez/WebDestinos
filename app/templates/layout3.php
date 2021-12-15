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
<div class="layout3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?ctl=home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?ctl=grupos&grupo=Espana">España</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="index.php?ctl=grupos&grupo=Europa">Europa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="index.php?ctl=grupos&grupo=Otros">Otros Destinos</a>
                </li>
            </ul>
        </div>
        <div class="aside_nav_element dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspoup="true" aria-expanded="false">
                Bienvenido<?php echo " ".$user?>
            </button>
            <div class="dropdown-menu" aria-labelledyby="dropdownMenuButton">
                <a class="dropdown-item" href="index.php?ctl=profile"><img class="pImage" src="../avatares/<?php echo $avatar?>" alt="...">Profile</a>
                <a class="dropdown-item">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="btn btn-logOut my-2 my-sm-0" type="submit" value="logOut">
                    </form>
                </a>
            </div>
            
        </div>
    </nav>
<?php echo $contenido ?>
<?php
    if($tipo<=1){
?>
  <div class="row">
        <p>
            Para ver los comentarios tienes que registrarte. <a href="index.php?ctl=signup"> Regístrate aquí.</a>
        </p>
    </div>
<?php
    }else{
?> 
<div class="row">
    <form name="formComent" method="post" action="index.php?ctl=login">
        <label for="textarea"></label>
        <p>
            <textarea name="comentario" cols='80' rows='5'>
            </textarea>
        </p>
        <p>
            <imput type="submit" <?php if(isset($_GET['id'])){?>name="reply"<?php}else{?>name="comentar"<?php}?> value="comenta">
        </p>
    </form>
</div>
            </br>
<?php
}
?>
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