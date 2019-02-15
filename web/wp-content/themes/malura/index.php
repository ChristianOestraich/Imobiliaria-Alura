<!--get_header, faz a função do include do php, ele é padrão do WordPress -->
<?php
    get_header();
    $queryTaxonomy = array_key_exists('taxonomy', $_GET); // esse comando filtra se tem busca ou não.
    if ($queryTaxonomy && $_GET['taxonomy'] === '') {

        wp_redirect(home_url()); // redireciona para a url escolida.
    }
?>
<main class="home-main">
	<div class="container">
        <?php $taxonomias = get_terms('localizacao'); ?> <!-- traz todas a localizações do bando de dados -->
        <form class="busca-localizacao-form" action="<?= bloginfo('url'); ?>" method="get">
            <div class="taxonomy-select-wrapper">
                <select name="taxonomy">
                    <option value=""> Todos os imóveis </option>
                    <?php foreach ($taxonomias as $taxonomia) { ?>
                    <option value="<?= $taxonomia->slug ?>"><?= $taxonomia->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit">Filtrar</button>
        </form>

        <?php
        if ($queryTaxonomy) {
            $taxQuery = array(
                array(
                    'taxonomy'=>'localizacao', // faz a localização
                    'field' => 'slug',  // Procura qual o campo da localização
                    'terms' => $_GET['taxonomy'] // Qual item vc vai querer
                )
            );
        }
			$args = array(
                'post_type' => 'imovel',
                 'tax_query' => $taxQuery
            );
			$loop = new WP_Query( $args ); // essa variável pesquisa no banco se tem imóveis.
			if( $loop->have_posts() ) { ?>
			<ul class="imoveis-listagem">
			<?php while( $loop->have_posts() ) {
					$loop->the_post(); ?>

				<li class="imoveis-listagem-item">
					<a href="<?= the_permalink(); ?>">
						<?php the_post_thumbnail(); ?> <!-- essa função exibi a imagem em destaque. -->

						<h2><?php the_title(); ?></h2> <!-- essa função exibi o titulo do post.-->

						<p><?php the_content(); ?></p> <!-- esse função exibi a descrição do post.-->
					</a>
				</li>

			<?php } ?>
			</ul>
		<?php	} ?>
	</div>
</main>


<?php get_footer(); ?>
<!--get_header, faz a função do include do php, ele é padrão do WordPress -->
