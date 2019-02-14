<!--get_header, faz a função do include do php, ele é padrão do WordPress -->
<?php get_header(); ?>

<main class="pagina">

    <article class="pagina">
        <h1 class="pagina-titulo">
            <?php the_title(); ?>
        </h1>

        <?php if( have_posts() ) {
            while( have_posts() ) {
                the_post();
        ?>

        <div class="pagina-conteudo">
            <?php the_content();?>
        </div>

       <?php
            }
        }
        ?>

    </article>
</main>

<?php get_footer(); ?>
<!--get_header, faz a função do include do php, ele é padrão do WordPress -->
