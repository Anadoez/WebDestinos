<?php ob_start() ?>
<div id="login">
<div class="container-md h-100">
    <div id="log_window" class="row h-100 justify-content-md-center align-items-center">
    <div  class="card offset-md-1 col-12 col-md-7">
        <div class="card-header row h-100 justify-content-md-center align-items-center">
            <!--<img class="img-fluid" src="images/logo.jpg" alt="...">-->
            <h3 class="h3">Login</h3>
        </div>
    <div class="card-body">
    <?php 
        if(isset($errores)){
            echo'<div class="alert alert-danger" role="alert">';	
            foreach($errores as $campo=> $valores){
                echo"<p> ".$valores."</p>"; 
            }
            echo'</div>';
        } 
        if(isset($clear)){
            echo"<div class='row'>
                <div class='col-4 offset-4 alert alert-light mt-5' class='alert alert-success' role='alert'>";
            foreach($clear as $campo=> $valores){
                   echo"<p class='clear'> ".$valores."</p>"; 
            }
            echo"</div>
            </div>";
        }
    ?>
        <form action="index.php?ctl=login" METHOD="POST" enctype="multipart/form-data">
            
        <div class="row">
                <div class="col-md-12">    
                    <label for="userN">Nick</label><br>
                    <input class="form-control" type="text" name="user" id="userN" required
                    value="<?php if(isset($_COOKIE["recuerda"]) && $_COOKIE["recuerda"]!="") { echo $_COOKIE["recuerda"]; } ?>"
                     ><br>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="passW">Contraseña</label><br>
                    <input class="form-control" type="password" name="pass" id="passW" required>
                </div>
               
                <!--<div class="row">
                    <div class="form-check custom-control custom-checkbox offset-4">
                        <input type="checkbox" class="custom-control-input " name="rem" id="remB" value="remember">
                        <label for="remB" class="custom-control-label">Remember</label>
                    </div>
                </div>-->
            </div>
            <br>
            
            <div class="row">
                <div class="col-12">
                    <input class="btn btn-lg btn-block" type="submit" name="login" value="Entrar"><br>
                </div>
            </div>
            <br>
        </form>
        <form action="index.php?ctl=login" METHOD="POST" enctype="multipart/form-data">
        <div class="row">
                <div class="col-12">
                    <input class="btn btn-lg btn-block" type="submit" name="invitado" value="Entrar como  invitado"><br>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
            <!--<div class="row">
                <div class="col-md-12">
                    <span><a href="index.php?ctl=forgot">Forgot your password?</a></span>
                </div>
            </div>-->
            <div class="row">
                <div class="col-md-12">
                    <span>¿No tienes una cuenta? <a href="index.php?ctl=signup">Registrate aquí</a></span>
                </div>
            </div>
    </div>
</div>
</div>
</div>


</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>