<?php

function isLogged(){
	if(!isset($_SESSION["nome"])) {
		header('Location: ../login/index.php');
		exit();
	}
}
?>