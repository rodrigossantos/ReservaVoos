<?php

namespace App;

class Voos{
	
	/*
	private origem;
	private destino;
	private dataIda;
	private dataVolta;
	private totAdultos;
	private totKids;
	*/
	private $nip;
	private $nome;
	private $email;
	
	 function __construct(array $arr) {
      $this->nip = $arr['nip'];
      $this->nome  = $arr['nome'];
      $this->email = $arr['email'];
    }
    
    public function getNip(){
		return $this->nip;
	}
	
	public function getNome(){
		return $this->nome;
		
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	/*
	public function getOrigem(){
		
	}
	
	public function setOrigem(){
		
	}
	
	public function getDestino(){
		
	}
	
	public function setDestino(){
		
	}
	
	public function getDataIda(){
		
	}
	
	public function setDataIda(){
		
	}
	
	public function getDataVolta(){
		
	}
	
	public function setDataVolta(){
		
	}
	
	public function getTotAdultos(){
		
	}
	
	public function setTotAdultos(){
		
	}
	
	public function getTotKids(){
		
	}
	
	public function setTotKids(){
		
	}
	
	*/
}

?>
