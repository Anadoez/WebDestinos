<?php
include_once ('Config.php');

class Model extends PDO
{

    protected $conexion;

    public function __construct()
    {
        
            $this->conexion = new PDO('mysql:host=' . Config::$mvc_bd_hostname . ';dbname=' . Config::$mvc_bd_nombre . '', Config::$mvc_bd_usuario, Config::$mvc_bd_clave);
            // Realiza el enlace con la BD en utf-8
            $this->conexion->exec("set names utf8");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    }

    public function login($usu){
        $consulta = "SELECT * from usuario where nick=:usu" ;
        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':usu', $usu);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function signup($usu,$pass,$email,$image){
        $consulta = "INSERT INTO usuario (nick, email, pass,avatar) values (?, ?, ?, ?)";
        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $usu);
        $result->bindParam(2, $email);
        $result->bindParam(3, $pass);
        $result->bindParam(4, $image);
        $result->execute();
        
        return $result;
    }

    public function contrasena($pas){
        $consulta="SELECT pass from usuario where pass=:pas";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':pas', $pas);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function usuario($usu){
        $consulta="SELECT nick from usuario where nick=:usu";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':usu', $usu);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function email($mail){
        $consulta="SELECT email from usuario where email=:mail";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':mail', $mail);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
    public function activaCuenta($usu){
        $consulta="UPDATE usuario SET tipo = 2 WHERE usuario.nick=:usu"; 
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':usu', $usu);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function comentario($usu,$dest,$com){
        $consulta = "INSERT INTO comentario (usuario, destino,contenido_coment) values (?, ?, ?)";
        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $usu);
        $result->bindParam(2, $dest);
        $result->bindParam(3, $com);
        $result->execute();
        
        return $result;
    }

    public function comentarioReply($usu,$dest,$com,$reply){
        $consulta = "INSERT INTO comentario (usuario, destino,contenido_coment) values (?, ?, ?)";
        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $usu);
        $result->bindParam(2, $dest);
        $result->bindParam(3, $com);
        $result->execute();
        
        return $result;
    }

    public function verComentarios(){
        $consulta = "SELECT * from comentario where reply=0 ORDER BY id_comentario DESC";
        
        $result = $this->conexion->prepare($consulta);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function grupos($grupo){
        $consulta = "SELECT * FROM destino WHERE grupos=:grup" ;
        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':grup', $grupo);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function borraCuenta($id){
        $consulta = "DELETE FROM usuario WHERE id_usu=:id" ;
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id',$id);
        $result->execute();

    }
}
?>
