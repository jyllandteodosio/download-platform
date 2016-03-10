<?php
/* Template Name: Custom Cart */

/* NOTE: put this if statement before get_header() */
if(isset($_GET['download-all'])){
	bulk_download();
	reports_log();
    deleteToCustomCart();
}


get_header(); 

?>

<h2>Cart</h2>

<form method="get" action="http://localhost/rtlcbsasia/cart/">
	<input type="hidden" name="download-all" id="download-all" value="download">
	<input type="submit" id="btn-download-all" value="Download All Files">
</form>

<?php 
// echo "<pre>";
//     print_r(get_custom_cart_contents('image'));
// echo "</pre><br>";

$image_cart_content = get_custom_cart_contents('image');
if (!empty($image_cart_content)) :?>
<h2>Images</h2>
<?php foreach ($image_cart_content as $file_id => $info) :?>
		<div >
			<div ><?php echo $info['file_title'];?></div>
			<div class='panel-body text-center'>
				<img src="<?php echo $info['thumb'];?>">
			</div>
			<a rel="nofollow" class="download-file"
				data-file-id="<?php echo $file_id;?>" data-file-title="<?php echo $info['file_title'] ?>" data-file-path="<?php echo $info['file_path'] ?>" data-download-url="<?php echo $info['download_url'] ?>" data-post-id="<?php echo $info['post_id'] ?>" data-file-type="<?php echo $info['file_type'] ?>" data-user-id="<?php echo $info['user_id'] ?>"
				href="<?php echo $info['download_url'];?>">
					&nbsp;Download
			</a>
			<!-- <span class='btn btn-primary btn-sm btn-block btn-add-to-cart' data-file-id='' data-file-title='' data-file-path='' data-post-id='' data-file-type='' data-user-id='' href='#'>Download</span> -->
			<span class='btn-remove-to-cart' data-file-id="<?php echo $file_id;?>" data-user-id="<?php echo $info['user_id'] ?>">Remove</span>
			<hr>
		</div>
<?php 
	endforeach;
endif;
?>

<?php
// echo "<pre>";
//     print_r(get_custom_cart_contents('promo'));
// echo "</pre><br>";

$promo_cart_content = get_custom_cart_contents('promo');
if (!empty($promo_cart_content)) :?>
<h2>Promos</h2>
<?php foreach ($promo_cart_content as $file_id => $info) :?>
	<div >
		<div ><?php echo $info['file_title'];?></div>
		<div class='panel-body text-center'>
			<img src="<?php echo $info['thumb'];?>">
		</div>
		<a rel="nofollow" download class=""
			data-file-id="<?php echo $file_id;?>" data-file-title="<?php echo $info['file_title'] ?>" data-file-path="<?php echo $info['file_path'] ?>" data-download-url="<?php echo $info['download_url'] ?>" data-post-id="<?php echo $info['post_id'] ?>" data-file-type="<?php echo $info['file_type'] ?>" data-user-id="<?php echo $info['user_id'] ?>"
			href="<?php echo $info['download_url'];?>">
				&nbsp;Download
		</a>
		<!-- <span class='btn btn-primary btn-sm btn-block btn-add-to-cart' data-file-id='' data-file-title='' data-file-path='' data-post-id='' data-file-type='' data-user-id='' href='#'>Download</span> -->
		<span class='btn-remove-to-cart' data-file-id="<?php echo $file_id;?>" data-user-id="<?php echo $info['user_id'] ?>">Remove</span>
		<hr>
	</div>
<?php 
	endforeach;
endif;
?>

<?php
// echo "<pre>";
//     print_r(get_custom_cart_contents('document'));
// echo "</pre><br>";

$document_cart_content = get_custom_cart_contents('document');
if (!empty($document_cart_content)) :?>
<h2>Documents</h2>
<?php foreach ($document_cart_content as $file_id => $info) :?>
	<div >
		<div ><?php echo $info['file_title'];?></div>
		<div class='panel-body text-center'>
			<img src="<?php echo $info['thumb'];?>">
		</div>
		<a rel="nofollow" download class=""
			data-file-id="<?php echo $file_id;?>" data-file-title="<?php echo $info['file_title'] ?>" data-file-path="<?php echo $info['file_path'] ?>" data-download-url="<?php echo $info['download_url'] ?>" data-post-id="<?php echo $info['post_id'] ?>" data-file-type="<?php echo $info['file_type'] ?>" data-user-id="<?php echo $info['user_id'] ?>"
			href="<?php echo $info['download_url'];?>">
				&nbsp;Download
		</a>
		<!-- <span class='btn btn-primary btn-sm btn-block btn-add-to-cart' data-file-id='' data-file-title='' data-file-path='' data-post-id='' data-file-type='' data-user-id='' href='#'>Download</span> -->
		<span class='btn-remove-to-cart' data-file-id="<?php echo $file_id;?>" data-user-id="<?php echo $info['user_id'] ?>">Remove</span>
		<hr>
	</div>
<?php 
	endforeach;
endif;
?>


<!-- </form> -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


<script type='text/javascript' language = 'JavaScript'>
                                jQuery(document).ready(function(){
                                    var ajaxurl = "<?php echo admin_url('/admin-ajax.php')?>";
                                    var cartnonce = "<?php echo wp_create_nonce('__rtl_cart_nonce__')?>";

                                    jQuery('.download-file').click(function(){
                                    	console.log('button click');

                                    	jQuery.post(
                                            ajaxurl, 
                                            {   'action': 'download_file',
                                                'file-id'   : jQuery(this).attr('data-file-id'),
                                                'file-path' : jQuery(this).attr('data-file-path'),
                                                'download-url' : jQuery(this).attr('data-download-url'),
                                                'post-id'   : jQuery(this).attr('data-post-id'),
                                                'file-type' : jQuery(this).attr('data-file-type'),
                                                'cartnonce'     : cartnonce
                                            },
                                            function(response) {
                                                console.log('download:');
                                                console.log(response);

                                            }
                                        );
                                    });


                                });
                            </script>