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

function registrar_menu_navegacao() {

    register_nav_menu('header-menu','main-menu'); // registra o menu de navegação.
}

add_action('init','registrar_menu_navegacao');

function geraTitule() {   // deixa a criterio do usuário modificar o nome do site no painel do WordPress.
    if( is_home() ) {
		bloginfo('name');
	} else {
		bloginfo('name');
		echo ' | ';
		the_title();
	}
}

function registra_taxonomia_localizacao() {

    $nomeSingular = 'Localização';
    $nomePlural = 'Localizações';


    $labels = array(

        'name' => $nomePlural,
        'singular-name' => $nomeSingular,
        'edit_item' => 'Editar' . $nomeSingular,
        'add_new_item' => 'Adicionar nova' . $nomeSingular
    );

    $args = array(

        'labels' => $labels,
        'public' => true,
        'hierarchical' => true // Sublocalização das cidades.
    );

    register_taxonomy('localizacao', 'imovel', $args); // Taxonomia é utilizada para ajudar a localizar algo.

}

add_action( 'init', 'registra_taxonomia_localizacao' );


function preenche_conteudo_informacoes_imovel($post) {

	$imoveis_meta_data = get_post_meta( $post->ID ); ?>

	<style>
		.maluras-metabox {
			display: flex;
			justify-content: space-between;
		}

		.maluras-metabox-item {
			flex-basis: 30%;

		}

		.maluras-metabox-item label {
			font-weight: 700;
			display: block;
			margin: .5rem 0;

		}

		.input-addon-wrapper {
			height: 30px;
			display: flex;
			align-items: center;
		}

		.input-addon {
			display: block;
			border: 1px solid #CCC;
			border-bottom-left-radius: 5px;
			border-top-left-radius: 5px;
			height: 100%;
			width: 30px;
			text-align: center;
			line-height: 30px;
			box-sizing: border-box;
			background-color: #888;
			color: #FFF;
		}

		.maluras-metabox-input {
			height: 100%;
			border: 1px solid #CCC;
			border-left: none;
			margin: 0;
		}

	</style>
	<div class="maluras-metabox">
		<div class="maluras-metabox-item">
			<label for="maluras-preco-input">Preço:</label>
			<div class="input-addon-wrapper">
				<span class="input-addon">R$</span>
				<input id="maluras-preco-input" class="maluras-metabox-input" type="text" name="preco_id"
				value="<?= number_format($imoveis_meta_data['preco_id'][0], 2, ',', '.'); ?>">
			</div>
		</div>

		<div class="maluras-metabox-item">
			<label for="maluras-vagas-input">Vagas:</label>
			<input id="maluras-vagas-input" class="maluras-metabox-input" type="number" name="vagas_id"
			value="<?= $imoveis_meta_data['vagas_id'][0]; ?>">
		</div>

		<div class="maluras-metabox-item">
			<label for="maluras-banheiros-input">Banheiros:</label>
			<input id="maluras-banheiros-input" class="maluras-metabox-input" type="number" name="banheiros_id"
			value="<?= $imoveis_meta_data['banheiros_id'][0]; ?>">
		</div>

		<div class="maluras-metabox-item">
			<label for="maluras-quartos-input">Quartos:</label>
			<input id="maluras-quartos-input" class="maluras-metabox-input" type="number" name="quartos_id"
			value="<?= $imoveis_meta_data['quartos_id'][0]; ?>">
		</div>

	</div>
<?php

}

function registra_meta_boxes() {
// esse comando caixas abaixo da descrição do dos imoveis, ajuda a adicionar mais informações sobre o imovel.
add_meta_box(

    'informacoes-dos-imoveis',
    'Informações do Imóvel',
    'preenche_conteudo_informacoes_imovel',
    'imovel',
    'normal',
    'default'

    );
}
add_action('add_meta_boxes','registra_meta_boxes');

// puxa do banco todos os posts e atualiza.

function atualiza_meta_info($post_id) {

    if( isset($_POST['preco_id']) ) {
		update_post_meta( $post_id, 'preco_id', sanitize_text_field( $_POST['preco_id'] ) );
	}
	if( isset($_POST['vagas_id']) ) {
		update_post_meta( $post_id, 'vagas_id', sanitize_text_field( $_POST['vagas_id'] ) );
	}
	if( isset($_POST['banheiros_id']) ) {
		update_post_meta( $post_id, 'banheiros_id', sanitize_text_field( $_POST['banheiros_id'] ) );
	}
	if( isset($_POST['quartos_id']) ) {
		update_post_meta( $post_id, 'quartos_id', sanitize_text_field( $_POST['quartos_id'] ) );
	}
}

add_action('save_post','atualiza_meta_info');
