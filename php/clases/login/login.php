
<?php
 
require_once  ("db.php");


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

class metodoLogin
{
    
    public function ingresarLogin($cedula,$clave)
    {
        
    
        $con=conexion();
      

        $tipo=1;
        if (session_status() == PHP_SESSION_NONE) {
            $tipo=0;
        }
   
        $query = "SELECT id_alumno FROM alumnos WHERE cedula_alumno='$cedula' AND cedula_alumno='$clave' ";
     
        $sql=mysqli_query($con,$query) or  die(mysqli_error($con));;
     
        $total=mysqli_num_rows($sql);
        
        $vals = mysqli_fetch_array($sql);
     
        if(!isset($_SESSION['id_alumno']))
        {
        if ($total >=1) {
            $arry =  array("success"=> true ,"respuesta"=>'Usuario correcto');
            $_SESSION['id_alumno']=$vals['id_alumno'];
          
            
            echo json_encode($arry);
        } else {
           
            $arry =  array("success"=> false ,"respuesta"=>'Contraseña y usuario mal');
            
            echo json_encode($arry);
            
           
        }
        }
        
    }
    
    public function salir(){
        session_start();
        session_destroy();
        header('location:../../../login/index.php');
    }

    public function prioridad($correo,$clave){


        $con=conexion();
        $password = md5($clave);

        $tipo=1;
        
        $query = "SELECT * FROM usuarios WHERE correo_usuario='$correo' AND clave_usuario='$password'";
     
        $sql=mysqli_query($con,$query) or  die(mysqli_error($con));;
     
        $total=mysqli_num_rows($sql);
        
        $vals = mysqli_fetch_array($sql);
     
        if(!isset($_SESSION['id_usuario']))
        {
        if ($total >=1) {
            $arry =  array("success"=> true ,"respuesta"=>'Usuario correcto',"tipo"=>$tipo);
            $_SESSION['id_usuario']=$vals['id_usuario'];
            $_SESSION['id_fksucursal_usuario']=$vals['id_fksucursal_usuario'];
            $_SESSION['rol_usuario']=$vals['rol_usuario'];
            
            echo json_encode($arry);
        } else {
           
            $arry =  array("success"=> false ,"respuesta"=>'Contraseña y usuario mal');
            
            echo json_encode($arry);
            
           
        }
    }




    }
    
    
    
    
    
    
    
    
    
}








 
?>