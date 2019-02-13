<!--get_header, faz a função do include do php, ele é padrão do WordPress -->
<?php get_header();?>

<?php
    if (have_posts()) { // verrifica se existe posts.

        while (have_posts()) {

            the_post();
?>


<?php
    }
}
?>

<?php get_footer();?>
<!--get_footer, faz a função do include do php -->
