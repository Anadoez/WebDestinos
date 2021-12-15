<?php ob_start() ?>
<?php
?>
<main class="container">
<div class="row">
    <div >
        <h2><?php echo  $lugar?></h2>
    </div>
</div>  
<div class="row" id="listaLugares">
<?php
if ($grupo=="Espana"){
    ?>
    <a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
        <div class="row">
            <h4>Barcelona</h4>
        </div>
        <div class="row">
            <img src="../Contenido/Espana/Barcelona/main.jpg" alt="..." class="img-fluid">
        </div>
    </a>
    <a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
        <div class="row">
            <h4>Cordova</h4>
        </div>
        <div class="row">
            <img src="../Contenido/Espana/Cordova/main.jpg" alt="..." class="img-fluid">
        </div>
    </a>
    <a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
        <div class="row">
            <h4>Madrid</h4>
        </div>
        <div class="row">
            <img src="../Contenido/Espana/Madrid/main.jpg" alt="..." class="img-fluid">
        </div>
    </a>
    <a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
        <div class="row">
            <h4>Pamplona</h4>
        </div>
        <div class="row">
            <img src="../Contenido/Espana/Pamplona/main.jpg" alt="..." class="img-fluid">
        </div>
    </a>
    <a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
        <div class="row">
            <h4>Sevilla</h4>
        </div>
        <div class="row">
            <img src="../Contenido/Espana/Sevilla/main.jpg" alt="..." class="img-fluid">
        </div>
    </a>
    <a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
        <div class="row">
            <h4>Valencia</h4>
        </div>
        <div class="row">
            <img src="../Contenido/Espana/Valencia/main.jpg" alt="..." class="img-fluid">
        </div>
    </a>
<?php    
}if ($grupo=="Europa"){
?>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Amsterdam</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Europa/Amsterdam/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Berlín</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Europa/Berlin/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Dublin</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Europa/Dublin/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Londres</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Europa/Londres/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Paris</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Europa/Paris/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Roma</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Europa/Roma/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
    
<?php
}if ($grupo=="Otros"){
?>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>El Cairo</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Otros/Cairo/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Dubai</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Otros/Dubai/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Hong Kong</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Otros/HongKong/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Nueva York</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Otros/NuevaYork/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<a class="col col-sm-5 offset-sm-1 col-md-3" href="index.php?ctl=destinos&dest=General">
    <div class="row">
        <h4>Tokio</h4>
    </div>
    <div class="row">
        <img src="../Contenido/Otros/Tokio/main.jpg" alt="..." class="img-fluid">
    </div>
</a>
<?php
}
?>
</div>
  
</main>
  
    

<?php $contenido = ob_get_clean() ?>
<?php include 'layout2.php' ?>