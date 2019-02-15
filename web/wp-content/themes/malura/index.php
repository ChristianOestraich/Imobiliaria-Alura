<!--get_header, faz a função do include do php, ele é padrão do WordPress -->
<?php get_header(); ?>
<main class="home-main">
	<div class="container">

        <?php
            $taxQuery = array(
                array(
                    'taxonomy'=>'localizacao', // faz a localização
                    'field' => 'slug',  // Procura qual o campo da localização
                    'terms' => 'rio-de-janeiro', // Qual item vc vai querer
                )
            );
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
