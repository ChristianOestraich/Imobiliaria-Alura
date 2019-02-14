<!doctype html>
<html>
<head>
	<?php $home = get_template_directory_uri(); ?>
    <meta charset="utf-8">
    <title>Imobiliária Malura</title>
	<link rel="stylesheet" href="<?= $home ?>/assets/css/reset.css"> <!-- Esse comando traz a o reset.css de dentro do tema-->
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/index.css"> <!-- Esse comando traz a o index.css de dentro do tema-->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/comum.css"> <!-- Esse comando traz a o comum.css de dentro do tema-->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/header.css"> <!-- Esse comando traz a o header.css de dentro do tema-->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/page.css"> <!-- Esse comando traz a o page.css de dentro do tema-->
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/single.css"> <!-- Esse comando traz a o single.css de dentro do tema-->

	<?php wp_head(); ?> <!--Coloca o painel de administrador no cabeçario do site -->
</head>
<body>
<header>

    <div class="container">
        <?php
            $args = array(
                'theme_location' => 'header-menu' // procura a localização do tema.
            );
            wp_nav_menu($args); // chamada do menu na tela.
        ?>
    </div>

</header>
