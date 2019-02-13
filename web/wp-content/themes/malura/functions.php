<?php

add_theme_support('post-thumbnails'); // Ele adiciona ao post a imagem destacada.

$labels = array(

    'name' => 'Imóveis',
    'name_singular' => 'Imóvel'
);

$args = array( //  Aqui aonde é feita a configuração

    'labels'=> $labels, // aqui vai ser passado o nome do novo conteudo, dentro de um array de nomes.
    'public'=> true // para deixar ele publico no painel do WordPress.
);

register_post_type('imovel', $args ); // Esse comando registra um novo conteudo no painel.Primeiro passo é passar como parametro o apelido e o segundo é uma configuração.
