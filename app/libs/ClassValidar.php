<?php

/**
 * Clase para realizar validaciones en el modelo
 * Es utilizada para realizar validaciones en el modelo de nuestras clases.
 *
 * @author Carlos Belisario
 */
class Validacion
{
    
    protected $_atributos;
    
    protected $_error;
    
    public $mensaje;
    
    /**
     * Metodo para indicar la regla de validacion
     * El método retorna un valor verdadero si la validación es correcta, de lo contrario retorna el objeto
     * actual, permitiendo acceder al atributo Validacion::$mensaje ya que es publico
     */
    public function rules($rule = array(), $data,$sanitizar=false)
    {
        if($sanitizar==true){
            foreach($data as $key=>$value){
                $data[$key]=Validacion::sanitiza($key);
            }
        }
        if (! is_array($rule)) {
            $this->mensaje = "the rules must be in an array format";
            return $this;
        }
        foreach ($rule as $key => $rules) {
            $reglas = explode(',', $rules['regla']);
            if (array_key_exists($rules['name'], $data)) {
                foreach ($data as $indice => $valor) {
                    if ($indice === $rules['name']) {
                        foreach ($reglas as $clave => $valores) {
                            $validator = $this->_getInflectedName($valores);
                            if (! is_callable(array(
                                $this,
                                $validator
                            ))) {
                                throw new BadMethodCallException("Not found the method $valores");
                            }
                            $respuesta = $this->$validator($rules['name'], $valor);
                        }
                        break;
                    }
                }
            } else {
                
                $this->mensaje[$rules['name']] = "the {$rules['name']} field is not within the validation rule or the form";
            }
        }
        if (!empty($this->mensaje)) {
            return $this;
        } else {
            return true;
        }
    }
    
    /**
     * Metodo inflector de la clase
     * por medio de este metodo llamamos a las reglas de validacion que se generen
     */
    private function _getInflectedName($text)
    {
        $validator = "";
        $_validator = preg_replace('/[^A-Za-z0-9]+/', ' ', $text);
        $arrayValidator = explode(' ', $_validator);
        if (count($arrayValidator) > 1) {
            foreach ($arrayValidator as $key => $value) {
                if ($key == 0) {
                    $validator .= "_" . $value;
                } else {
                    $validator .= ucwords($value);
                }
            }
        } else {
            $validator = "_" . $_validator;
        }
        
        return $validator;
    }
    //Sanitiza el clos datos
    public static function sanitiza($var){
        if(isset($_REQUEST[$var])){
            $tmp=strip_tags(sinEspacios($_REQUEST[$var]));
        }else{
            $tmp="";
        }
        return $tmp;
    }
    /**
     * Metodo de verificacion de que el dato no este vacio o NULL
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _noEmpty($campo, $valor)
    {
        if (isset($valor) && ! empty($valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "the field $campo must be filled";
            return false;
        }
    }
    
    /**
     * Metodo de verificacion de tipo numerico
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _numeric($campo, $valor)
    {
        if (is_numeric($valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "the field $campo must be numeric";
            return false;
        }
    }
    
    /**
     * Metodo de verificacion de tipo email
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    /*
    Cambiado preg_match:
    "/^[a-z]+([\.]?[a-z0-9_-]+)*@[a-z]+([\.-]+[a-z0-9]+)*\.[a-z]{2,}$/"
    por
    "/^[a-z]+([\.]?[a-z0-9_-]+)*@(iesabastos[\.-]org)$/"
    */
    protected function _email($campo, $valor)
    {
        if (preg_match("/^[a-z]+([\.]?[a-z0-9_-]+)*@(iesabastos[\.-]org)$/", $valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "the field $campo to be in the email format usuario@iesabastos.org";
            return false;
        }
    }
    protected function _cPassword($campo,$valor)
    {
        if (preg_match("/^[A-Za-z0-9 ]{1,15}+$/", $valor)){
            return true;
        }else{
            $this->mensaje[$campo][] = $campo." should only contain numbers and letters";
            return false; 
        }     
    }

    protected function _cUser($campo,$valor)
    {
        if (preg_match("/^[A-Za-z0-9 ]{2,25}+$/", $valor)){
           return true; 
        }   
        else{
            $this->mensaje[$campo][] = $campo." should only contain numbers and letters";
            return false; 
        }
    }
    protected function sinEspacios($frase) {
        $texto = trim(preg_replace('/ +/', ' ', $frase));
        return $texto;
    }
}


/* el uso de la clase es muy sencillo os dejo las pruebas que realice a la clase*/

/*$_POST['campo1'] = "d";
$_POST['campo2'] = "usuariohotmail.com";
$_POST['campo3']="usuario@iesabastosorg";
$datos = $_POST;
$validacion = new Validacion();
$regla = array(
    array(
        'name' => 'campo2',
        'regla' => 'no-empty,email'
    ),
    array(
        'name' => 'campo1',
        'regla' => 'no-empty,numeric'
    ),
    array(
        'name'=>'campo3',
        'regla'=>'no-empty,email'
    )
);
$validaciones = $validacion->rules($regla, $datos);
echo"<pre>";
print_r($validaciones);
echo"</pre>";
 echo $validacion->mensaje;
 echo"<pre>";
 print_r($validacion->mensaje);
 echo"</pre>";
 $errores=$validacion->mensaje;
 foreach($errores as $campo=> $valores){
     foreach($valores as $indice=>$valor){
        
     echo $valor."<br>"; 
     }
 }*/
?>