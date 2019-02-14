<!--get_header, faz a função do include do php, ele é padrão do WordPress -->
<?php get_header();?>

<main>

    <article>

        <?php
            if (have_posts()) { // verrifica se existe posts.

                while (have_posts()) {

                    the_post();
        ?>
            <div class="single-imovel-thumbnail">
                <?php the_post_thumbnail() ?>
            </div>
            <div class="container">
                <section class="chamada-principal">
                    <?php the_title(); ?>
                </section>
                <section class="single-imovel-geral">
                    <div class="single-imovel-descricao">
                        <?php the_content(); ?>
                    </div>
                </section>
                    <span class="sigle-imovel-data">
                        <?php the_date(); ?>
                    </span>
            </div>
        <?php
            }
        }
        ?>
    </article>

</main>

<?php get_footer();?>
<!--get_footer, faz a função do include do php -->
