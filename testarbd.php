<?php
	// require_once 'config.php'; 
	// require_once DBAPI; 
	// mudar para include
	include 'config.php';
	include DBAPI;

	// implementa o controle de erro e excessão
	try {
		$db = open_database(); 
		echo '<h1>Banco de Dados Conectado!</h1>';
	} catch (Exception $e){
		echo "<h1> {$e->getMessage()}</h1> \n" ;  // o \n é para quebrar a linha do código fonte
	}
	
	// Esse procedimento no módo procedural é trocado pelo acima com OO e controle de erro e excessão
	// if ($db) {
	//		echo '<h1>Banco de Dados Conectado!</h1>';
	// } else {
	//		echo '<h1>ERRO: Não foi possível Conectar!</h1>';
	//}
?>
