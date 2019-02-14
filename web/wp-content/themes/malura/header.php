<!doctype html>
<html>
<head>
	<?php $home = get_template_directory_uri(); ?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?= $home ?>/assets/css/reset.css"> <!-- Esse comando traz a o reset.css de dentro do tema-->
	<link rel="stylesheet" href="<?= $home; ?>/style.css"> <!-- Esse comando traz a o style.css de dentro do tema-->


	<?php	wp_head(); ?> <!--Coloca o painel de administrador no cabeçario do site -->
</head>
<body>
