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

                    Swal.fire({
                        title: 'Advertencia!',
                        text: 'No tiene una nota aprobatoria',
                        icon: 'info',
                        confirmButtonText: 'Ok'
                      })
                   
                   
                }
                else if(pdf=="")
                {
                    Swal.fire({
                        title: 'Advertencia!',
                        text: 'Aun no se sube el certificado',
                        icon: 'info',
                        confirmButtonText: 'Ok'
                      })
                  
                }
                
                else{
                    window.open('data:application/pdf;base64,'+ pdf, '_blank');
                   

                }

                

               


            }

        )
   
    });

    





}



function salir(){


   
    Swal.fire({
        title: '¿Seguro que desea salir?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si'
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