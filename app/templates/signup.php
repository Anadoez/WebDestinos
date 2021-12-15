<?php ob_start() ?>
<?php 
if(isset($clear)){
    echo"<div class='row'>
        <div class='col-4 offset-4 alert alert-light mt-5' class='alert alert-success' role='alert'>";
    foreach($clear as $campo=> $valores){
           echo"<p class='clear'> ".$valores."</p>"; 
    }
    echo'<div>
        <a class="text-info" href="index.php?ctl=login"><--Turn back to Log in</a>
    </div>';
    echo"</div>
    </div>";
}else{
?>
<div id="signup">
<div class="container h-100">
    <div id="signup_window" class="row h-100 justify-content-md-center align-items-center">
    <div class="card offset-md-1 col-12 col-md-7">
        <div class="card-header row h-100 justify-content-md-center align-items-center">
                <h3 class="h3">Registro</h3>
        </div>
        <div class="card-body">
            <form action="index.php?ctl=signup" METHOD="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">    
                        <label for="userN">Nick</label><br>
                        <input class="form-control" type="text" name="user" id="userN" required><br>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">    
                        <label for="email">Correo electrónico</label><br>
                        <input class="form-control" type="email" name="email" id="email" required><br>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">    
                        <label for="passW">Contraseña</label><br>
                        <input class="form-control" type="password" name="pass" id="passW" required><br>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">    
                        <label for="passW2">Repita la contraseña</label><br>
                        <input class="form-control" type="password" name="pass2" id="passW2" required><br>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">    
                        <div id="custom_file" class="btn">
                            <input type="file" class="custom-file-input" name="image" id="file_send" required> 
                            <span id="text" class="custom-file-label">Imágen de perfil </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="signUp col-12">  
                        <input id="sigSend" class="btn btn-lg btn-block" type="submit" name="signup" value="Sign Up"><br>
                        <br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php 

if(!empty($errores)){
    echo"<div class='row'>
        <div class='col-4 offset-4 alert alert-light mt-5' role='alert'>";
    foreach($errores as $campo=> $valores){
           echo"<p class='error'> ".$valores."</p>"; 
        
    }
    echo'<div>
            <a class="text-info" href="index.php?ctl=login"><--Turn back to Log in</a>
            </div>';
    echo"</div>
    </div>";
} 
}
?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>