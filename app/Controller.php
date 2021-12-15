<?php
include ('libs/utils.php');
class Controller
{
    //***************************************************Controller del login
    public function login(){
        try {
            if (isset($_POST['login'])) {
                //recojo datos y los ordeno en el array $data
                $usuario = recoge("user");
                $pass = recoge("pass");
                $data['nick']=$usuario;
                $data['pass']=$pass;
                $sesion= new Sessions();
                //Uso la funcuin de utils.php validarLogin y valido los datos incluidos
                if(validarLogin($data)==true){
                    /*una vez validados hago la consulta, si los datos estan
                        en la base de datos entramos en home.php
                    */
                    $m = new Model();
                    $result=$m->login($usuario);
                    $m2=new Model();
                    $result2=$m2->contrasena($pass);
                    $passDescry=crypt($pass,$result["pass"]);
                    if (count($result)!=0 || count($result2)!=0){
                        if($usuario==$result["nick"]&& $passDescry==$result["pass"]){
                           if($result["tipo"]<1){
                            $errores['desactivado']="No has activado tu cuenta, por favor revise su correo";
                           }else{
                             $sess=$sesion->create_session("currUser",true);
                            $sesion->insert_value("currUser",$result);
                            $sesion->est_time();
                            
                            header('Location: index.php?ctl=home&entra='.$entra);   
                           }
                            
                        }else{
                            //Si usuario y pass no iguales a los de la bd
                            $errores["query"]="Usuario o contraseña incorrectos";
                        }
                        
                    }else{
                        //Si no encuentra usuario y contraseña en la base de datos
                        $errores["query"]="No hay ninguna cuenta con este nick";
                    }
                }else{
                    //Si al insertar los datos no tienen el formato correcto
                   $errores=validarLogin($data)->mensaje;
                }
            }
            if (isset($_POST['invitado'])) {
                $sesion= new Sessions();
                $data=array('nick' => "invitado", 'avatar'=>'invitado.png', 'tipo'=>1);
                $sess=$sesion->create_session("currUser",true);
                $sesion->insert_value("currUser",$data);
                $sesion->est_time();
                header('Location: index.php?ctl=home&entra='.$entra); 
            }
            if(isset($_GET["activo"])){
                $clear["sucsess"]="Se ha confirmado su correo electrónico ya puede iniciar sesión."; 
                $usuario = recoge("usuario");
                $m = new Model();
                $m->activaCuenta($usuario);
            }
            
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
            echo"error";
        } 
        require __DIR__ . '/templates/login.php';
    }

    //**********************************************************************Controller del registro
    public function signup(){
        try{
            if (isset($_POST['signup'])) {
                $archivo = "";
                $errores=[];
                $resultado=array();
                $exp = array(
                    'image/jpg',
                    'image/gif',
                    'image/png'
                );
                $dir = "../avatares/";
                $nom = "image";
                //recojo datos creo array $data
                $usuario = recoge("user");
                $email = recoge("email");
                $pass = recoge("pass");
                $pass2 = recoge("pass2");
                $data["user"]=$usuario;
                $data["email"]=$email;
                $data["pass"]=$pass;
                $data["pass2"]=$pass2;
                //valido datos del array data
                if(validaRegistro($data)==true){
                    //Si los datos son correctos validos, valido el archivo adjunto
                    if($pass===$pass2){
                        $salt = '$2a$07$usesomesillystringforsalt$';
                        $passEncry = crypt($pass, $salt);
                        //$pass=crypt_blowfish($pass);
                            $archivo = compArchivo($nom, $dir, $exp,$usuario,$errores);
                            if ($archivo !== false) {
                                //Si el archivo es correcto se suben los datos a la BD
                                $m = new Model();
                                $m2=new Model();
                                $m3=new Model();
                                if($resultado=$m2->usuario($usuario)=="" || $resultado=$m2->usuario($usuario)==null){
                                    if($resultado=$m2->email($email)==""||$resultado=$m2->email($email)==null){
                                        $resultado= $m->signup($usuario,$passEncry,$email,$archivo);
                                        confirmEmail($usuario,$email);
                                        $clear["sucsess"]="Registrado correctamente. Se ha enviado un correo electrónico a su cuenta.";  
                                    }else{
                                        $errores["email"]="Error: Este correo electrónico ya está registrado";
                                    }
                                }else{
                                    $errores["usuario"]="Error: Este nick ya está registrado";
                                }
                                
                            }
                        
                    }else{
                            //Si la primera contraseña no es igual a la degunda
                            $errores["Password"]="Error: La contraseña no es igual";
                        }
                }else{
                        //Si los datos no son correctos
                    $errores["datos"]="Error: Los datos son incorrectos";
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/templates/signup.php';
    }

    //Página de error
    public function error()
    {
        require __DIR__ . '/templates/error.php';
    }

    //Página de error de nivel
    public function errorLevel()
    {
        require __DIR__ . '/templates/errorLevel.php';
    }

    //************************************************************************************Controller de home
    public function home()
    {
        $sesion= new Sessions();
        //$sesion->display_session("currUser");
        //$sesion->display_session("time");
        $nick=$_SESSION["currUser"]["nick"];
        $avatar=$_SESSION["currUser"]["avatar"];
        $tipo=$_SESSION["currUser"]["tipo"];
        if(isset($_POST['logOut'])){
            $sesion->destroy();
            header('Location: index.php?ctl=login');
        }
        require __DIR__ . '/templates/home.php';

    }
    

    
    public function profile(){
        $sesion= new Sessions();
        //$sesion->display_session("currUser");
        //$sesion->display_session("time");
        $id_usu=$_SESSION["currUser"]["id_usu"];
        $nick=$_SESSION["currUser"]["nick"];
        $avatar=$_SESSION["currUser"]["avatar"];
        $tipo=$_SESSION["currUser"]["tipo"];
        $email=$_SESSION["currUser"]["email"];
        $fecha=$_SESSION["currUser"]["fechaReg"];
        $fechaReg=darVuelta($fecha);
        if(isset($_POST['subeImg'])){
        $archivo = "";
        $errores=[];
        $resultado=array();
        $exp = array(
            'image/jpg',
            'image/gif',
            'image/png'
        );
        $dir = "../avatares/";
        $nom = "image";
        $archivo = compArchivo($nom, $dir, $exp,$nick,$errores);
    }
        if(isset($_POST['borra'])){
            $m = new Model();
            $m->borraCuenta($id_usu);
            $sesion->destroy();
            header('Location: index.php?ctl=login');
        }

        require __DIR__ . '/templates/profile.php';
    }
    public function grupos(){
        $sesion= new Sessions();
        $nick=$_SESSION["currUser"]["nick"];
        $avatar=$_SESSION["currUser"]["avatar"];
        $tipo=$_SESSION["currUser"]["tipo"];
        $grupo=$_GET['grupo'];
        $m = new Model();
        $result=$m->grupos($grupo);
        $_SESSION["currUser"]["grupo"]=$result;
        $destinos=$_SESSION["currUser"]["grupo"];
        //$sesion->display_session("currUser");
        switch($grupo){
            case "Espana":$dir="../Contenido/Espana/";$lugar="España";break;
            case "Europa":$dir="../Contenido/Europa/";$lugar="Europa";break;
            case "Otros":$dir="../Contenido/Otros/";$lugar="Otros";
        }

        require __DIR__ . '/templates/grupos.php';
    }
    public function destinos(){
        $sesion= new Sessions();
        //$sesion->display_session("currUser");
        $nick=$_SESSION["currUser"]["nick"];
        $avatar=$_SESSION["currUser"]["avatar"];
        $tipo=$_SESSION["currUser"]["tipo"];
        $destino=$_GET['dest'];
        /*switch($destino){
            case "Barcelona":$dir="../Contenido/Espana/Barcelona/";$lugar="Barcelona";break;
            case "Cordova":$dir="../Contenido/Espana/Cordova/";$lugar="Córdova";break;
            case "Madrid":$dir="../Contenido/Espana/Madrid/";$lugar="Madrid";break;
            case "Pamplona":$dir="../Contenido/Espana/Pamplona/";$lugar="Pamploana";break;
            case "Sevilla":$dir="../Contenido/Espana/Sevilla/";$lugar="Sevilla";break;
            case "Valencia":$dir="../Contenido/Espana/Valencia/";$lugar="Valéncia";
        }*/
        $lugar="Lorem";
        $dir="../Contenido/General/";
        if(isset($_POST['comentar'])){
            $comentario=recoge('comentario');
            $m = new Model();
             $resultado= $m->comentario($nick,$destino,$comentario);

        }
        if(isset($_POST['reply'])){
            $comentario=recoge('comentario');
            $m = new Model();
            $reply=$_GET["id"];
             $resultado= $m->comentario($nick,$destino,$comentario,$reply);
        }
        require __DIR__ . '/templates/destinos.php';
    }
    public function destinos2(){
        $sesion= new Sessions();
        $sesion->display_session("currUser");
        $nick=$_SESSION["currUser"]["nick"];
        $avatar=$_SESSION["currUser"]["avatar"];
        $tipo=$_SESSION["currUser"]["tipo"];
        if(isset($_POST['comentar'])){
            $comentario=recoge('comentario');

        }
        if(isset($_POST['reply'])){
            $comentario=recoge('comentario');
            
        }
        require __DIR__ . '/templates/destinos.php';
    }
    public function destinos3(){
        $sesion= new Sessions();
        $sesion->display_session("currUser");
        $nick=$_SESSION["currUser"]["nick"];
        $avatar=$_SESSION["currUser"]["avatar"];
        $tipo=$_SESSION["currUser"]["tipo"];
        if(isset($_POST['comentar'])){
            $comentario=recoge('comentario');

        }
        if(isset($_POST['reply'])){
            $comentario=recoge('comentario');
            
        }
        require __DIR__ . '/templates/destinos.php';
    }
    public function privacyP(){
        require __DIR__ . '/templates/privacyP.php';
    }
    public function cookie(){
        require __DIR__ . '/templates/cookie.php';
    }
}
?>