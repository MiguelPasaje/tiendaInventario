/* ajax */
$('#formlogin').submit(function(e){
    e.preventDefault();
    let usuario = $.trim($("#usuario").val());
    let password = $.trim($("#password").val());
    // alert(usuario +" "+ password)

    if(usuario == "" || password == ""){
        /* alert("campos Vacios") */
        Swal.fire({
            icon:'warning',
            title:'debe ingresar usuario y contraseña'
        });
        return false;
    }else{
        $.ajax({
            url:"login/login.php",
            type:"POST",
            datatype:"json",
            data:{
                usuario:usuario,
                password:password
            },
            success:function(data){
                console.log(typeof(data));       
                console.log(data);     
                let datos = data.toString();
                /* let t = JSON.parse(data);
                console.log(t[0]);
                console.log(typeof(t));        */
                
                //console.log(5 == 5);
                if(datos == 5){
                    //console.log("sapo")
                    Swal.fire({
                        icon:'error',
                        title:'usuario y/o pasword incorrectos',
                    });
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'conexion exitosa',
                        showConfirmButton:false,                        
                        timer:1000                     
                    });
                    setTimeout(redirect,1000);
                    
                }
            }
        })
    }

});

function redirect(){
    window.location.href='vistas/pag_inicio.php';

}