<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Rebêlo
	// Objetivo: "rolar" dados dos RPGs de mesa mais 
	// Versão Original (Pastebin https://pastebin.com/Vj16ynRh): 02/07/2014 - Ricardo Erick Rebêlo
	// Alterações:
	// 0.1   21/04/2023 - Conversão

	namespace jacknpoe;

	//***********************************************************************************************
	// Classe DungeonsAndDragos (D&D)

	class DungeonsAndDragons
	{
		public $DicesSize = 0;
		public $QuantDices = 0;
		public $Modifier = 0;
		public $Dices = array();

		function __construct( $size = 20, $quant = 1, $mod = 0)
		{
			$this->DicesSize = $size;
			$this->QuantDices = $quant;
			$this->Modifier = $mod;
		}

		function rollDices()
		{
			$indice = 0;
			for( $indice = 1; $indice <= $this->QuantDices; $indice++)
			{
				$this->Dices[ $indice] = rand( 1, $this->DicesSize);
			}
		}

		function getTotal()
		{
			$temp = $this->Modifier;
			$indice = 0;
			for( $indice = 1; $indice <= $this->QuantDices; $indice++)
			{
				$temp += $this->Dices[ $indice];
			}
			return $temp;
		}
	}

	//***********************************************************************************************
	// Classe GURPS (Generic and Universal Role Playing System)

	class GURPS
	{
		public $QuantDices = 0;
		public $Modifier = 0;
		public $Dices = array();

		function __construct( $quant = 1, $mod = 0)
		{
			$this->QuantDices = $quant;
			$this->Modifier = $mod;
		}

		function rollDices()
		{
			$indice = 0;
			for( $indice = 1; $indice <= $this->QuantDices; $indice++)
			{
				$this->Dices[ $indice] = rand( 1, 6);
			}
		}

		function getTotal()
		{
			$temp = $this->Modifier;
			$indice = 0;
			for( $indice = 1; $indice <= $this->QuantDices; $indice++)
			{
				$temp += $this->Dices[ $indice];
			}
			return $temp;
		}
	}

	//***********************************************************************************************
	// Classe Storyteller ()

	class Storyteller
	{
		public $QuantDices = 0;
		public $Difficulty = 0;
		public $Dices = array();

		function __construct( $quant = 1, $dif = 0)
		{
			$this->QuantDices = $quant;
			$this->Difficulty = $dif;
		}

		function rollDices()
		{
			$indice = 0;
			for( $indice = 1; $indice <= $this->QuantDices; $indice++)
			{
				$this->Dices[ $indice] = rand( 1, 10);
			}
		}

		function getTotal()
		{
			$temp = 0;
			$indice = 0;
			for( $indice = 1; $indice <= $this->QuantDices; $indice++)
			{
				if( $this->Dices[ $indice] === 1) { $temp -= 1; }
				if( $this->Dices[ $indice] >= $this->Difficulty) { $temp += 1; }
			}
			return $temp;
		}
	}
?>