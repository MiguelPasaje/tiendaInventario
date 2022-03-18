
$(function(){
    listarProductos();
    //console.log("Bienvenido crud js");
    let editar = false;

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
                            <td >${producto.id_producto}</td>
                            <td>${producto.codigo_Barras_producto}</td>
                            <td><a data-toggle="modal" data-target="#exampleModal" href="#" class="producto_item" id="${producto.id_producto}">${producto.Nombre_producto}</a></td>
                            <td>${producto.precio_compra}</td>
                            <td>${producto.precio_Venta}</td>
                            <td>${producto.descripcion}</td>
                            <td>${producto.Nombre_categoria}</td>
                            <td>
                                <button class=" product-Delete btn btn-danger" id="${producto.id_producto}">
                                    DELETE
                                </button>
                            </td>
                        </tr>
                    `
                });

                $('#Productos_search').html(template);
                $('#product-result').show();
                
                

            }
        })
        }

    });
    //guardar producto
    $('#producto-form').submit(function(e){
        e.preventDefault();
        //console.log("Producto");
        const submit = {
            id: $('#id_producto').val(),
            CodigoBarras: $('#CodigoBarras').val(),
            NameProducto: $('#NameProducto').val(),
            precioCompra: $('#precioCompra').val(),
            precioVenta: $('#precioVenta').val(),
            descripcion: $('#descripcion').val(),
            categoria: $('#categoria').val(),

        }

        let url = editar === false ? 'save_producto.php' : 'edit_producto.php'; //ternario

        //console.log(postDate);
        $.post(url,submit,function(response){
            console.log(response); 
            let resp = response;
            if(response == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'Gardado Exitosamente',
                    showConfirmButton:false,                        
                    timer:1000                     
                });
                $('#producto-form').trigger('reset');
                listarProductos();
            }else if(response == 2){
                Swal.fire({
                    icon: 'success',
                    title: 'Editado Exitosamente',
                    showConfirmButton:false,                        
                    timer:1000                     
                });
                $('#producto-form').trigger('reset');
                listarProductos();
                editar = false;
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...! No se agrego el producto',
                    Text: resp,
                    footer: resp

                });

            }
        });
    });

    //listar productos
    function listarProductos(){
        $.ajax({
            url:'llist_productos.php',
            type:'GET',
            success:function(response){
                //console.log(response);
                let productos = JSON.parse(response);
                let template = '';
                productos.forEach(producto =>{
                    template += `
                        <tr product-id="${producto.id_producto}">
                            <td >${producto.id_producto}</td>
                            <td>${producto.codigo_Barras_producto}</td>
                            <td><a data-toggle="modal" data-target="#exampleModal" href="#" class="producto_item" id="${producto.id_producto}">${producto.Nombre_producto}</a></td>
                            <td>${producto.precio_compra}</td>
                            <td>${producto.precio_Venta}</td>
                            <td>${producto.descripcion}</td>
                            <td>${producto.Nombre_categoria}</td>
                            <td>
                                <button class=" product-Delete btn btn-danger" id="${producto.id_producto}">
                                    DELETE
                                </button>
                            </td>
                        </tr>
                    `
                });
    
                $('#tb_Productos').html(template);
    
                
            }
        });
    }
    //eliminar producto
    $(document).on('click','.product-Delete',function(){
        //console.log("clickeado");
        /* let elemnt = $(this)[0].parentElement.parentElement;
        let id = $(elemnt).attr('product-id');
        console.log(id); */
        let id = $(this).attr('id');
        console.log(id);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.post('delete_producto.php',{id},function(response){
                    //console.log(response);
                    listarProductos();        
                });
                
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                
              
            }
          });
        
    });

    //colocar el producto en el form
    $(document).on('click','.producto_item',function(){
        //console.log('editando');
        let id = $(this).attr('id');
        //console.log(id);
        $.post('single_producto.php',{id},function(response){
            //console.log(response);
            const producto = JSON.parse(response);
            console.log(producto);            
            $('#CodigoBarras').val(producto.codigo_Barras_producto);
            $('#NameProducto').val(producto.Nombre_producto);
            $('#precioCompra').val(producto.precio_compra);
            $('#precioVenta').val(producto.precio_Venta);
            $('#descripcion').val(producto.descripcion);
            $('#categoria').val(producto.cod_categoria_fk);
            $('#id_producto').val(producto.id_producto);


            editar = true;
        });


    });

    $('#cerrar_form').click(function(){
        $('#producto-form').trigger('reset');
        $('#id_producto').val('');
        editar = false;

    });
    



});