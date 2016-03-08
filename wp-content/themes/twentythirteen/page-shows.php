<?php
/* Template Name: Shows */

get_header(); ?>
<h2>Shows</h2>

<?php 
// TODO: fetch assigned show category from operator access table
$assigned_show_category = 'entertainment';
// TODO: wait frontend design for letter filter UI 
$letter_filter = '';
echo do_shortcode("[wpdm_category_custom id='{$assigned_show_category}' operator='IN' title='Shows' toolbar='1' order_by='title' order='asc' item_per_page='12' letter_filter = '{$letter_filter}' ]");?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>