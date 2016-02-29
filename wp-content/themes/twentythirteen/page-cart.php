<?php
/* Template Name: Custom Cart */

get_header(); ?>
<h2>Cart</h2>

<?php 


echo "<pre>";
    print_r(get_custom_cart_contents('image'));
echo "</pre><br>";

echo "<pre>";
    print_r(get_custom_cart_contents('promo'));
echo "</pre><br>";

echo "<pre>";
    print_r(get_custom_cart_contents('document'));
echo "</pre><br>";

?>



<?php get_sidebar(); ?>
<?php get_footer(); ?>