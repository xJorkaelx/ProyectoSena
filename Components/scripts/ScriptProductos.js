function saveProduct(){

	var codigo = $('#codigo').val();
	var nombre = $('#nombre').val();
	var tipo = $('#tipo').val();
	var valor = $('#valor').val();
	var unidad = $('#cantidad').val();
	$.ajax({
		url: '../Controllers/productoController.php?opc=create',
		type: 'POST',
		data: "codigo="+codigo+"&nombre="+nombre+"&tipo="+tipo+"&valor="+valor+"&unidad="+unidad,
		success: function(result) {
			alert(result);
		}
	});

	$('#codigo').val("");
	$('#nombre').val("");
	$('#tipo').val("unselect");
	$('#valor').val("");
	$('#cantidad').val("");
	setTimeout("viewData()",1800);
	$('#myModalCreateProduct').modal('hide');
	
}



function editProduct(){

	var codigo = $('#codigoe').val();
	var nombre = $('#nombree').val();
	var tipo = $('#tipoe').val();
	var valor = $('#valore').val();
	console.log("este es el valor" + valor);
	var unidad = $('#cantidade').val();
	
	var temporal = $.ajax({
		url: '../Controllers/productoController.php?opc=edit',
		type: 'POST',
		data: "codigo="+codigo+"&nombre="+nombre+"&tipo="+tipo+"&valor="+valor+"&unidad="+unidad,
		success: function(result) {
			alert(result);
		}
	});

	$('#codigoe').val("");
	$('#nombree').val("");
	$('#tipoe').val("unselect");
	$('#valore').val("");
	$('#cantidade').val("");
	setTimeout("viewData()",1800);
	$('#myModalEditProduct').modal('hide');
	

}


function deleteProduct(){

	var codigo = $('#codigoe').val();
	
	$.ajax({
		url: '../Controllers/productoController.php?opc=delete',
		type: 'POST',
		data: "codigo="+codigo,
		success: function(result) {
			alert(result);
		}
	});
	viewData();
	$('#codigoe').val("");
	setTimeout("viewData()",800);
	$('#myModalDeleteProduct').modal('hide');


}



$(document).ready(function () {

});

function viewData(){

		var table = $('#dataTableProducto').DataTable().destroy();
    		table = $('#dataTableProducto').DataTable({
                "ajax": {
                    "url" : '../Controllers/productoController.php',
                    "type" : "get",
                    "datatype" : "json"
                },
                "columns": [
                    { "data": "cod_pro", "autoWidth": true },
                    { "data": "nom_pro", "autoWidth": true },
                    { "data": "tipo_pro", "autoWidth": true },
                    { "data": "valorunit_pro", "autoWidth": true },
                    { "data": "unidad_pro", "autoWidth": true },
                    { "data": "total_pro", "autoWidth": true },
                    { "defaultContent":"<button type='button' class='editar btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button> <button type='button' class='eliminar btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button>"}
                ]

            });
        
        obtenerDataEdit("#dataTableProducto tbody", table);
        obtenerIdDelete("#dataTableProducto tbody", table);
}



        var obtenerDataEdit = function(tbody, table){
        	$(tbody).on("click", "button.editar", function(){
        		var data = table.row( $(this).parents("tr") ).data();
        		var codigo = $('#codigoe').val(data.cod_pro);
				var nombre = $('#nombree').val(data.nom_pro);
				var tipo = $('#tipoe').val(data.tipo_pro);
				var valor = $('#valore').val(data.valorunit_pro);
				var unidad = $('#cantidade').val(data.unidad_pro);
				$('#myModalEditProduct').modal('show');
									
			});
        }

        var obtenerIdDelete = function(tbody, table){
        	$(tbody).on("click", "button.eliminar", function(){
        		var datae = table.row( $(this).parents("tr") ).data();
        		var codigo = $('#codigoe').val(datae.cod_pro);
				$('#myModalDeleteProduct').modal('show');
			});
        }






