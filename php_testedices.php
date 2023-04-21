<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Teste de Classe \jacknpoe\RollingDices (rola dados de RPGs de mesa)</title>
 		<link rel="stylesheet" href="php_testedices.css"/>
		<link rel="icon" type="image/png" href="php_testedices.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			header( "Content-Type: text/html; charset=ISO-8859-1", true);

			// D&D
			$dd_lados = '';
			$dd_quantidade = '';
			$dd_modificador = '';
			// GURPS
			$gurps_quantidade = '';
			$gurps_modificador = '';
			// Storyteller
			$st_quantidade = '';
			$st_dificuldade = '';
			// Resultados
			$dd_dados = '';
			$dd_resultado = '';
			$gurps_dados = '';
			$gurps_resultado = '';
			$st_dados = '';
			$st_resultado = '';

			if( isset( $_POST[ 'dd_rodar']) or isset( $_POST[ 'gurps_rodar']) or isset( $_POST[ 'st_rodar']))
			{
				require_once( 'RollingDices.php');

				if( isset( $_POST[ 'dd_rodar']))
				{
					// D&D
					$dd_lados =  $_POST['dd_lados'];
					$dd_quantidade =  $_POST['dd_quantidade'];
					$dd_modificador =  $_POST['dd_modificador'];
					$dados = new \jacknpoe\DungeonsAndDragons( (int)$dd_lados, (int)$dd_quantidade, (int)$dd_modificador);
					$dados->rollDices();
					$indice = 0;
					for( $indice = 1; $indice <= (int)$dd_quantidade; $indice++)
					{
						$dd_dados = $dd_dados . strval( $dados->Dices[ $indice]) . " ";
					}
					$dd_resultado = 'Resultado: ' . $dados->getTotal();
				}

				if( isset( $_POST[ 'gurps_rodar']))
				{
					// GURPS
					$gurps_quantidade =  $_POST['gurps_quantidade'];
					$gurps_modificador =  $_POST['gurps_modificador'];
					$dados = new \jacknpoe\GURPS( (int)$gurps_quantidade, (int)$gurps_modificador);
					$dados->rollDices();
					$indice = 0;
					for( $indice = 1; $indice <= (int)$gurps_quantidade; $indice++)
					{
						$gurps_dados = $gurps_dados . strval( $dados->Dices[ $indice]) . " ";
					}
					$gurps_resultado = 'Resultado: ' . $dados->getTotal();
				}

				if( isset( $_POST[ 'st_rodar']))
				{
					// Storyteller
					$st_quantidade =  $_POST['st_quantidade'];
					$st_dificuldade =  $_POST['st_dificuldade'];
					$dados = new \jacknpoe\Storyteller( (int)$st_quantidade, (int)$st_dificuldade);
					$dados->rollDices();
					$indice = 0;
					for( $indice = 1; $indice <= (int)$st_quantidade; $indice++)
					{
						$st_dados = $st_dados . strval( $dados->Dices[ $indice]) . " ";
					}
					$st_resultado = 'Resultado: ' . strval( $dados->getTotal());
				}
			}
		?>
		<h1>Rola Dados</h1><br>

		<h1>Dungeon and Dragons<br></h1>
		<form action="php_testedices.php" method="POST" style="border: 0px">
			<p>Lados: <input type="text" name="dd_lados" value="<?php echo $dd_lados; ?>" style="width: 50px"></p>
			<p>Quantidade: <input type="text" name="dd_quantidade" value="<?php echo $dd_quantidade; ?>" style="width: 50px"></p>
			<p>Modificador: <input type="text" name="dd_modificador" value="<?php echo $dd_modificador; ?>" style="width: 50px"></p>
			<p><input type="submit" name="dd_rodar" value="Jogar"></p>
		</form><br>
		<p><?php echo $dd_dados; ?></p>
		<p><?php echo $dd_resultado; ?></p>
		<br>

		<h1>GURPS<br></h1>
		<form action="php_testedices.php" method="POST" style="border: 0px">
			<p>Quantidade: <input type="text" name="gurps_quantidade" value="<?php echo $gurps_quantidade; ?>" style="width: 50px"></p>
			<p>Modificador: <input type="text" name="gurps_modificador" value="<?php echo $gurps_modificador; ?>" style="width: 50px"></p>
			<p><input type="submit" name="gurps_rodar" value="Jogar"></p>
		</form><br>
		<p><?php echo $gurps_dados; ?></p>
		<p><?php echo $gurps_resultado; ?></p>
		<br>

		<h1>Storyteller<br></h1>
		<form action="php_testedices.php" method="POST" style="border: 0px">
			<p>Quantidade: <input type="text" name="st_quantidade" value="<?php echo $st_quantidade; ?>" style="width: 50px"></p>
			<p>Dificuldade: <input type="text" name="st_dificuldade" value="<?php echo $st_dificuldade; ?>" style="width: 50px"></p>
			<p><input type="submit" name="st_rodar" value="Jogar"></p>
		</form><br>
		<p><?php echo $st_dados; ?></p>
		<p><?php echo $st_resultado; ?></p>
		<br>

		<p><a href="https://github.com/jacknpoe/php_testejuros">Repositório no GitHub</a></p><br><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>