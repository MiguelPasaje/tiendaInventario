
$(function(){
    
    $('#product-result').hide();
    //search
    $('#search').keyup(function(){
        if($('#search').val()){
            let search = $('#search').val();
        console.log(search);

        $.ajax({
            url: 'search-producto.php',
            type:'POST',
            data: {search},// esto es igual a search: search
            success:function(response){
                //console.log(response + " -----");
                let productos = JSON.parse(response);
                let template = '';
                //console.log(productos);
                productos.forEach(producto =>{
                    template += `
                    <tr product-id="${producto.id_producto}">
                            
                            <td>${producto.Nombre_producto}</td>
                            <td>${producto.precio_compra}</td>
                            <td>${producto.precio_Venta}</td>
                            <td>${producto.descripcion}</td>                            
                            
                        </tr>
                    `
                });

                $('#Productos_search').html(template);
                $('#product-result').show();
                
                

            }
        })
        }

    });
  



   


});