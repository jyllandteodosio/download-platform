<?php
/* Template Name: Shows */

get_header(); ?>
<h2>Shows</h2>

<?php 
// TODO: fetch assigned show category from operator access table
$assigned_show_category = 'entertainment,extreme';
// TODO: wait frontend design for letter filter UI 
$letter_filter = '';
echo do_shortcode("[wpdm_category_custom id='{$assigned_show_category}' operator='IN' title='Shows' toolbar='0' order_by='title' order='asc' item_per_page='2' letter_filter = '{$letter_filter}' ]");?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<div class="pagination-wrap innerpage-show-pagination">
  <!--        <a href="#" class="prev pull-left"><i class="fa fa-lg fa-caret-left"></i>Previous</a>-->
         <a class="prev page-numbers" href="http://localhost/rtlcbsasia/shows/page/1/?cp_entertainment=2"><i class="fa fa-lg fa-caret-left"></i> Previous</a>
          <span class="page-numbers current">1</span>
			<a class="page-numbers" href="http://localhost/rtlcbsasia/shows/page/2/?cp_entertainment=1">2</a>
			<a class="page-numbers" href="http://localhost/rtlcbsasia/shows/page/3/?cp_entertainment=1">3</a>
			<a class="page-numbers" href="http://localhost/rtlcbsasia/shows/page/4/?cp_entertainment=1">4</a>
			<a class="page-numbers" href="http://localhost/rtlcbsasia/shows/page/5/?cp_entertainment=1">5</a>
			<span class="page-numbers dots">…</span>
			<a class="page-numbers" href="http://localhost/rtlcbsasia/shows/page/10/?cp_entertainment=1">10</a>
		<a class="next page-numbers" href="http://localhost/rtlcbsasia/shows/page/2/?cp_entertainment=1">Next <i class="fa fa-lg fa-caret-right"></i></a>  <!--       <a href="#" class="next pull-right">Next <i class="fa fa-lg fa-caret-right"></i></a>-->
</div>

<!-- 
 
<div class="metro-block span4 wpdm-metro" style="margin: 0 5px 7px 0;">
    <a href="[page_url]">
    [thumb_500x300]
    </a>
    <div class="caption">
    <h4 class="media-heading" style="padding: 0px;margin:0px">[page_link]</h4>
    <p>
    [file_size] | [download_count] downloads 
    </p> 
    <div class="btn-group">
    <a href="[page_url]" class="btn btn-inverse">Details</a>[download_link]
    </div>
    </div>
</div> 


<div class="item">
    <img src="[thumb_270x296]" alt="America's Funniest Home Videos"/>
    <div class="show-meta">
        <p>[title]</p>
    </div>
    <a href="[page_url]" class="item-link" title="[title]"></a>
</div>
 -->