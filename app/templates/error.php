<?php ob_start() ?>

<div class="row">
    <div class="col-4 offset-4 alert alert-light mt-5" role="alert">

        <h3 class="h3"> Ha habido un error. </h3>
        <div>
            <a class="text-info" href="index.php?ctl=login"><--Volver al login</a>
        </div>
    </div>

</div>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
