<?php 

	/**
	* clase para gestionar productos
	*/
	class Producto{
		
		var $cod_pro;	
		var $nom_pro;
		var $unidad_pro;
		var $total_pro;
		var $tipo_pro;
		var $valorunit_pro;

		function __construct($cod_prod,$nom_prod,$unidad_prod,$tipo_prod,$valorunit_prod){
			
			$this->cod_pro = $cod_prod;	
			$this->nom_pro = $nom_prod;
			$this->unidad_pro = $unidad_prod;
			$this->valorunit_pro = $valorunit_prod;	
			$this->total_pro = $unidad_prod * $valorunit_prod;	
			$this->tipo_pro = $tipo_prod;
		}

		public function getCod()
		{
		    return $this->cod_pro;
		}
		
		public function setCod($cod_pro)
		{
		    $this->cod_pro = $cod_pro;
		    return $this;
		}
		

		public function getNom()
		{
		    return $this->nom_pro;
		}
		
		public function setNom($nom_pro)
		{
		    $this->nom_pro = $nom_pro;
		    return $this;
		}

		public function getUni()
		{
		    return $this->unidad_pro;
		}
		
		public function setUni($unidad_pro)
		{
		    $this->unidad_pro = $unidad_pro;
		    return $this;
		}

		public function getTotal()
		{
		    return $this->total_pro;
		}
		
		public function setTotal($total_pro)
		{
		    $this->total_pro = $total_pro;
		    return $this;
		}

		public function getTipo()
		{
		    return $this->tipo_pro;
		}
		
		public function setTipo($tipo_pro)
		{
		    $this->tipo_pro = $tipo_pro;
		    return $this;
		}

		public function getValor()
		{
		    return $this->valorunit_pro;
		}
		
		public function setValor($valorunit_pro)
		{
		    $this->valorunit_pro = $valorunit_pro;
		    return $this;
		}
}

 ?>