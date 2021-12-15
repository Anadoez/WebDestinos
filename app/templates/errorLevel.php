<?php ob_start() ?>

<div class="row">
    <div class="col-4 offset-4 alert alert-light mt-5" role="alert">

        <h3 class="h3"> Lo sentimos</h3>
        <p>No puedes visualizar esta página </p>
        <div>
            <a class="text-info" href="index.php?ctl=home"><--Volver a Home</a>
        </div>
    </div>

</div>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout2.php' ?>
