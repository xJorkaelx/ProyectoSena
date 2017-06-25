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
	$('#myModalCreateProduct').modal('hide');
}


$(document).ready(function () {

});

function viewData(){
	
    	var table = $('#dataTableProducto').dataTable({
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
                    { "defaultContent":"<button type='button' class='editar btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button> <button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button>"}
                ]

            });
        
        obtenerDataEdit("#dataTableProducto tbody", table);
}

        var obtenerDataEdit = function(tbody, table){
        	$(tbody).on("click", "button.editar", function(){
        		var data = table.row( $(this).parents("tr") ).data();
        		console.log(data);
        	});
        }





