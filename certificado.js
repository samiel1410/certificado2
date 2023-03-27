function certificado(id) {

    



    $(document).ready(function () {


        $.post("php/negocios/alumno/recuperarCertificado.php",
            {
                id_inscripcion: id
                
            },
            function (data) {
                data = JSON.parse(data);
                console.log(data);

                pdf = data.cert;

                nota= data.nota;
             
                if(nota <17 ){
                    swal("Advertencia!", "No tiene una nota aprobatoria!", "info");
                   
                }
                else if(pdf=="")
                {
                    swal("Advertencia!", "Aun no se sube el certificado!", "info");
                }
                
                else{
                    window.open('data:application/pdf;base64,'+ pdf, '_blank');
                   

                }

                

               


            }

        )
   
    });

    





}



function salir(){


   
    swal({
        title: '¿Seguro que desea eliminar el registro?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, eliminar!'
    }).then((result) => {
    if (result.value) {

        
        $(document).ready(function () {


            $.post("php/negocios/login/salir.php"
            )
       
        });
    
    
        var redirect = 'login/index.php';
        window.location = redirect;
    }
});

   

}