<?php
/* Template Name: Promos */

get_header(); ?>
<h2>This Month's Promos</h2>
<pre>
<?php
print_r(getMonthsPromos());
?>
</pre>
<?php get_sidebar(); ?>
<?php get_footer(); ?>