<?php

add_theme_support('post-thumbnails'); // Ele adiciona ao post a imagem destacada.

function register_post_type_imoveis() {

    $nomeSingular = 'Imóvel';
    $nomePlural = 'Imóveis';

    $description = 'Imóveis da imobiliária Malura';

    $labels = array(

        'name' => $nomePlural,
        'name_singular' => $nomeSingular,
        'add_new_item' => 'Adicionar novo ' . $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular
    );

    $supports = array(

        'title', // nome do imóvel
        'editor', // descrição.
        'thumbnail' // imagem em destaque.
    );

    $args = array( //  Aqui aonde é feita a configuração

        'labels' => $labels, // aqui vai ser passado o nome do novo conteudo, dentro de um array de nomes.
        'public' => true, // para deixar ele publico no painel do WordPress.
        'description' => $description, // mostra uma pequena descrição.
        'menu_icon' => 'dashicons-admin-home', // altera o icone do painel.
        'supports' => $supports // tudo que pode ser adicionalvel no imóvel deve constar dentro desse array.
    );

    register_post_type('imovel', $args ); // Esse comando registra um novo conteudo no painel.Primeiro passo é passar como parametro o apelido e o segundo é uma configuração.
}

add_action('init','register_post_type_imoveis'); // A função dele é chamar tarefas no painel do WordPress.

