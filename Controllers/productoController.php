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
				$msg = "borrado Exitoso";
			}else{
				$msg = "Error al borrar";
			}
		}else{
			$msg = "El Codigo del Producto No Se encuentra Registrado";
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
				$msg = "Gurdado Exitoso";
			}else{
				$msg = "No Guardo";
			}
		}else{
			$msg = "El Codigo del Producto Ya Se encuentra Registrado";
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