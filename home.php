<?php
	session_start();
	require'libs/Smarty.class.php';

	$smarty = new Smarty();

	$smarty->display("homeTpl.tpl")
?>