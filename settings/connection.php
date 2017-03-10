<?php
	//Nome de usuário e senha utilizados para a conexão PDO.
	$username = 'root';
	$password = 'root';
	
	//Tratamento de erros com a conexão.
	try{
		//Instância PDO de conexão com a base de dados.
		$conn = new PDO('mysql:host=localhost;dbname=corridaunespdb', $username, $password);
		
		//Atribuição do erro de conexão.
		$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		
		//Exibe o erro da conexão.
		echo('A conexão falou. Erro: ' . $e -> getMessage());
	}
?>