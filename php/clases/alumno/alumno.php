
<?php
 
require_once  ("db.php");


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

class metodoAlumno
{
    
    public function recuperar($id_inscripcion)
    {
        
    
        $con=conexion();
      

        
   
        $query = "SELECT certificado_inscripcion,calificacion_inscripcion  FROM inscripciones WHERE id_inscripcion =$id_inscripcion ";
     
      

        $verificar = mysqli_query($con, $query) or die(mysqli_error($con));

        $vals = mysqli_fetch_array($verificar);
   
        $binary = base64_encode($vals['certificado_inscripcion']);

   
        
        if ($verificar) {
            $resp = "Certificado encontrado";
            $arry = array(
                "success" => true,
                "respuesta" => $resp,
                "cert" =>    $binary,
                "nota" =>     $vals['calificacion_inscripcion']
                
            );
        } 

        echo json_encode($arry);


    
        
    }
    





    
    
    
    
    
    
    
    
    
    
}








 
?>