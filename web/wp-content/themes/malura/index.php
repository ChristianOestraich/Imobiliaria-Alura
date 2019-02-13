<!--get_header, faz a função do include do php, ele é padrão do WordPress -->
<?php get_header();?>

<main class="home-main">
    <div class="container">

        <h1>Bem Vindo ao Maluras!</h1>
        <ul class="imoveis-listagem">
            <?php
                $args = array('post_type' => 'imovel');
                $loop = new WP_Query($args); // essa variável pesquisa no banco se tem imóveis.
                if ($loop->have_posts()) {

                    while ($loop->have_posts()) {
                        $loop->the_post();
                ?>
                        <li class="imoveis-listagem-item">
                            <?php the_post_thumbnail();?> <!-- essa função exibi a imagem em destaque. -->
                            <h2><?php the_title();?></h2> <!-- essa função exibi o titulo do post.-->
                            <div><?php the_content();?></div> <!-- esse função exibi a descrição do post.-->
                        </li>
                <?php
                    }
                }
            ?>
        </ul>
    </div>
</main>
<?php get_footer();?>
<!--get_footer, faz a função do include do php -->
