<?php
/* Template Name: Custom Cart */

get_header(); ?>
<h2>Cart</h2>

<?php 


echo "<pre>";
    print_r(get_custom_cart_contents('image'));
echo "</pre><br>";?>

<div class='col-md-4 col-sm-6 col-xs-6'>
	<div class='panel panel-default'>
		<div class='panel-heading ttip' title='{$fileTitle}'>asd</div>
		<div class='panel-body text-center'>thumb</div>
		<div class='panel-footer'>
			<span class='btn btn-primary btn-sm btn-block btn-add-to-cart' data-file-id='' data-file-title='' data-file-path='' data-thumb='' data-post-id='' data-file-type='' data-user-id='' href='#'>Download</span>
		</div>
		<span class='btn btn-primary btn-sm btn-block btn-remove-to-cart' data-file-id='' data-user-id='' href='#'>Remove</span>
	</div>
</div>
<?php
echo "<pre>";
    print_r(get_custom_cart_contents('promo'));
echo "</pre><br>";

echo "<pre>";
    print_r(get_custom_cart_contents('document'));
echo "</pre><br>";

?>



<?php get_sidebar(); ?>
<?php get_footer(); ?>