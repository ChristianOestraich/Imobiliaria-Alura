<!--get_header, faz a função do include do php, ele é padrão do WordPress -->
<?php get_header();?>

<h1>Bem Vindo!!</h1>

<?php
// essa validação verifica se tem post.
if (have_posts()) {

    while (have_posts()) {
        the_post();
?>
        <h2><?php the_title();?></h2> <!--essa função exibi o titulo do post.-->
        <div><?php the_content();?></div> <!-- esse função exibi a descrição do post.-->
<?php
    }
}
?>
<?php get_footer();?>
<!--get_footer, faz a função do include do php -->
