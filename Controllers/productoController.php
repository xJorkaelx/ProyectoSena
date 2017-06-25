<?php

	include_once ("../Models/producto.php");
	include_once ("../DAO/productoDao.php");

	$page = isset($_GET['opc'])?$_GET['opc']:'';
	$prodDao = new ProductoDao();
	if($page == 'delete'){
		$codigo = $_POST['codigo'];
		if($prodDao->read($codigo) != null){

			$result = $prodDao->delete($codigo);

			if($result){
				echo "borrado Exitoso";
			}else{
				echo "Error al borrar";
			}
		}else{
			echo "Parece que el producto que intenta Eliminar no se encuentra en nuestros Registros";
		}		
	}else if($page == 'create'){
		$codigo = $_POST['codigo'];

		if($prodDao->read($codigo) == null){

			$nombre = $_POST['nombre'];
			$unidad = $_POST['unidad'];
			$valor = $_POST['valor'];
			$tipo = $_POST['tipo'];

			$prod = new Producto($codigo,$nombre,$unidad,$tipo,$valor);

			$result = $prodDao->create($prod);

			if($result){
				echo "Gurdado Exitoso";
			}else{
				echo "No Guardo";
			}
		}else{
			echo "El Codigo del Producto Ya Se encuentra Registrado";
		}
	}else if($page == 'edit'){
		
		$codigo = $_POST['codigo'];

		if($prodDao->read($codigo) != null){

			$nombre = $_POST['nombre'];
			$unidad = $_POST['unidad'];
			$valor = $_POST['valor'];
			$tipo = $_POST['tipo'];

			$prod = new Producto($codigo,$nombre,$unidad,$tipo,$valor);

			$result = $prodDao->update($prod);


			if($result){
				echo "Su Producto Fue Editado Satisfactoriamente";
			}else{
				$msg = "Sentimos las molestias un error ha ocurrido durante el proceso";
			}
		}else{
			echo "Parece que el producto que intenta modificar ya no se encuentra en nuestros Registros";
		}
	}else{

		$temporal = $prodDao->readAll();
		
		foreach ($temporal as $value) {
			$lista["data"][] = $value;
		}
		
		echo json_encode($lista);
		
		$msg = "estoy listando";
	}



 ?>