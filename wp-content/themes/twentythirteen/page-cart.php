<?php
/* Template Name: Custom Cart */

get_header(); ?>
<h2>Cart</h2>

<?php 


echo "<pre>";
        print_r(get_custom_cart_contents()); die();
        echo "</pre>";

?>



<?php get_sidebar(); ?>
<?php get_footer(); ?>