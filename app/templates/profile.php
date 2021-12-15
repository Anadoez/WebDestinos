<?php ob_start() ?>
<main class="container">
    <div class="row">
        <div class="col col-sm-5">
            <div>
                <img class="imageProfile" src="../avatares/<?php echo $avatar;?>" alt='...'>
                
            </div>
        </div>
        <div class="col col-sm-7">
        <form action="index.php?ctl=profile" class="form-group" METHOD="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
            <div id="custom_file" class="btn">
                            <input type="file" class="custom-file-input" name="image" id="file_send" required> 
                            <span id="text" class="custom-file-label">Avatar </span>
                        </div>
            </div>
            <div class="col-12">
                <input class="btn btn-lg btn-block profileBtn" type="submit" name="subeImg" value="Cambiar avatar"><br>
            </div>
            </div>
            <?php 

if(!empty($errores)){
    echo"<div class='row'>
        <div class='col-4 offset-4 alert alert-light mt-5' role='alert'>";
    foreach($errores as $campo=> $valores){
           echo"<p class='error'> ".$valores."</p>"; 
        
    }
} 

?>
        </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="div col col-sm-12">
            <table class="table">
                <tr>
                    <td>Nick</td>

                    <td><?php echo $nick ?></td>
                </tr>
                <tr>
                    <td>Email</td>

                    <td><?php echo $email ?></td>
                </tr>
                <tr>
                    <td>Fecha registro</td>

                    <td><?php echo $fechaReg ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="div col col-sm-12">
        <form action="index.php?ctl=profile" METHOD="POST" enctype="multipart/form-data">
        <div class="row">
                <div class="col-12">
                    <input class="btn btn-lg btn-block profileBtn" type="submit" name="borra" value="Borrar cuenta"><br>
                </div>
            </div>
        </form>
        </div>
    </div>

</main>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout2.php' ?>