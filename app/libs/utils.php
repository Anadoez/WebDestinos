<?php
//Aqui pondremos las funciones de validación de los campos
include_once('ClassValidar.php');

//valida los datos del login
function validarLogin($data)
{   
    $validator=new Validacion();
    $regla = array(
        array(
            'name' => 'nick',
            'regla' => 'no-empty,cUser'
        ),
        array(
            'name' => 'pass',
            'regla' => 'no-empty,cPassword'
        )
    );
    $validate=$validator->rules($regla,$data,true);
    
    return $validate;
}

//valida los datos introducidos en el registro
function validaRegistro($data){
    $validator=new Validacion();
    $regla=array(
        array(
            'name'=>'nick',
            'regla'=>'no-empty,cUser'
        ),
        array(
            'name' => 'email',
            'regla' => 'no-empty,email'
        ),
        array(
            'name' => 'pass',
            'regla' => 'no-empty,cPassword'
        ),
        array(
            'name' => 'pass2',
            'regla' => 'no-empty,cPassword'
        )
    );
    $validate=$validator->rules($regla,$data,true);
    return $validate;
}

//recoge los datos del formulario
function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp=strip_tags(sinEspacios($_REQUEST[$var]));
        else
            $tmp= "";
            
            return $tmp;
}

//quita los espacios sobrntes de una cadena
function sinEspacios($frase) {
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

//Dar vuelta
function darVuelta($string){
    	
    $ar=explode ( '-' , $string );
    $ar=array_reverse($ar);
    $revString=implode('-',$ar);
    return $revString;
}
//Manda un email
function confirmEmail($nick,$email){
    $to      = $email;
    $subject = "Correo de Confirmacion";
    $message = "Bienvenido a Web Destinos\r\n"." Sigue este vinculo para activar tu cuenta"."\r\n\r\n"
    ." http://localhost/Proyecto/WebDestinos/web/index.php?ctl=login&usuario=".$nick."&activo=".true."\r\n";
    $anminEmail='From: webd3stinos@gmx.com';

    if(mail($to, $subject, $message, $anminEmail)){
        $clear["enviadoCorreo"]='El correo se ha enviado correctamente';
    }
    else{
        $errores["enviaEmail"]= 'Error:No se ha podido mandar tu correo';
    }
}
//comprueva un fichero del campo $_FILES del registro
function compArchivo($nom,$dir,$exp,$usu,&$errores){
    if ($_FILES[$nom]['error'] != 0) {
        
        switch ($_FILES[$nom]['error']) {
            case 1:
                $errores=array("UPLOAD_ERR_INI_SIZE <br>","El archivo es demasiado grande<br>");break;
                
            case 2:
                $errores=array("UPLOAD_ERR_FORM_SIZE<br>",'El archivo es demasiado grande<br>');break;
            case 3:
                $errores=array("UPLOAD_ERR_PARTIAL<br>",'The file could not be uploaded in its entirety<br>');break;
            case 4:
                $errores=array("UPLOAD_ERR_NO_FILE<br>",'The file could not be uploaded<br>');break;
            case 6:
                $errores=array("UPLOAD_ERR_NO_TMP_DIR<br>","Missing temporary folder<br>");break;
            case 7:
                $errores=array("UPLOAD_ERR_CANT_WRITE<br>","It couldn't be written on the disk<br>");
            default:
                $errores=array('Indeterminate error.');
        }
        return false;
    } else {
        // Sino ha habido errores en la subida
        /*
         * Comprobamos que el fichero es del tipo que esperamos.
         * Tener en cuenta que este tipo viene determinado por lo que envía el navegador del usuario, no es del todo
         * segura
         */
        // Podríamos comprobar con un array de posibles tipos válidos
        if(!in_array($_FILES[$nom]['type'],$exp)){
            $errores["extension"]= 'Error:La extensión es incorrecta';
            return false;
        }
        
        // Si el formato es el esperado lo guardaremos definitivamente
        
        else{
            /*
             * Cambio nombre de la imagen al formato user+extension
             */
            $nombre = $_FILES[$nom]['name'];
            $ext=substr($nombre, strrpos($nombre, '.'));
            $nombre = $usu.$ext;
           
            // Movemos el fichero a su nueva ubicación
            if (move_uploaded_file($_FILES[$nom]['tmp_name'], $dir.$nombre)) {
                return $nombre;
            } else {
                array_push($errores, 'Error: No se puede mover el archivo a esta destinación');
                return false;
            }
        }
    }
}
?>