<?php 
	
	include_once ("../Models/producto.php"); 
	include_once ("../Conexion/conexion.php");
	/**
	* se controlan todas las funciones crud del producto
	*/
	class ProductoDao
	{
		var $conexion;

		function __construct(){
			$this->conexion = new Conexion();
		}

		function create($producto){

			
			$pro = $producto;
			try{
				$db = $this->conexion->open();
			
				$codigo = $pro->getCod();
				$nombre = $pro->getNom();
				$unidadPro = $pro->getUni();
				$totalpro = $pro->getTotal();
				$tipopro = $pro->getTipo();
				$valunit = $pro->getValor();
				
				$stmt = $db->prepare("insert into producto(cod_pro,unidad_pro,total_pro,tipo_pro,valorunit_pro,nom_pro) values(?,?,?,?,?,?)");
				$stmt->bindParam(1,$codigo);
				$stmt->bindParam(2,$unidadPro);
				$stmt->bindParam(3,$totalpro);
				$stmt->bindParam(4,$tipopro);
				$stmt->bindParam(5,$valunit);
				$stmt->bindParam(6,$nombre);
				if($stmt->execute()){
					return true;
				}
			} catch(PDOException $e){
				echo "Algo ocurrio en el proceso de insertcion de producto en la base de datos - Error: " . $e ;
			}
			return false;
		}


		function read($codigoent){

			try{

				$db = $this->conexion->open();
			
				$codigo = $codigoent;
			
				$stmt = $db->prepare("select * from producto where cod_pro = ?");
				if($stmt->execute(array($codigo))){
					while($fila = $stmt->fetch()){
						return new Producto($fila[0],$fila[5],$fila[1],$fila[3],$fila[2],$fila[4]);
					}
				}
				$this->conexion->close();
				return null;

			}catch(PDOException $e){
				echo "Algo ocurrio en el proceso de insertcion de producto en la base de datos - Error: " . $e ;
				return null;
			}

		}


	function readAll(){

			try{

				$lista;
				$db = $this->conexion->open();
				$lista = new SplObjectStorage();
				$stmt = $db->prepare("select * from producto");
				if($stmt->execute()){
					while($fila = $stmt->fetch()){
						$lista->attach(new Producto($fila[0],$fila[5],$fila[1],$fila[3],$fila[2],$fila[4]));
					}
				}else{
					return null;
				}
				$this->conexion->close();
				return $lista;

			}catch(PDOException $e){
				echo "Algo ocurrio en el proceso de insertcion de producto en la base de datos - Error: " . $e ;
				return null;
			}

		}


	function update($producto){
		$pro = $producto;
			try{
				$db = $this->conexion->open();
			
				$codigo = $pro->getCod();
				$nombre = $pro->getNom();
				$unidadPro = $pro->getUni();
				$totalpro = $pro->getTotal();
				$tipopro = $pro->getTipo();
				$valunit = $pro->getValor();
				
				$stmt = $db->prepare("update producto set unidad_pro=?, total_pro = ?,tipo_pro = ?,valorunit_pro = ?,nom_pro = ? where cod_pro=?");
				
				$stmt->bindParam(1,$unidadPro);
				$stmt->bindParam(2,$totalpro);
				$stmt->bindParam(3,$tipopro);
				$stmt->bindParam(4,$valunit);
				$stmt->bindParam(5,$nombre);
				$stmt->bindParam(6,$codigo);

				if($stmt->execute()){
					return true;
				}

			} catch(PDOException $e){
				echo "Algo ocurrio en el proceso de insertcion de producto en la base de datos - Error: " . $e ;
			}
			return false;
	}

	function delete($codigoent){
		try{
				$db = $this->conexion->open();
			
				$codigo = $codigoent;
				
				$stmt = $db->prepare("delete from producto where cod_pro=?");
				
				$stmt->bindParam(1,$codigo);

				if($stmt->execute()){
					return true;
				}

			} catch(PDOException $e){
				echo "Algo ocurrio en el proceso de insertcion de producto en la base de datos - Error: " . $e ;
			}
			return false;	
	}

}

?>