<!-- WPDM Template: Custom Template -->

<div class="single-item-wrap data-div-handler" data-channel="[current_channel]" data-filter="[filter_days]">
 	<form id='table-key' class="table-files" method='post' >
        [categorized_files]
    </form>

    <div class="single-item-banner-wrap">
    	<img src="[acf_banner_image]" class="banner-bg fullwidth"/> <!--This is used to assign the custom filtered background behind the primary image --> 
  	</div><!-- single-item-banner-wrap -->

  	<div class="main-content-wrap">
    	<div class="main-banner-wrap">
     		<img src="[acf_banner_image]" class="banner-main fullwidth"/> <!--This is used to assign the primary banner image -->  
    	</div><!-- main-banner-wrap -->
	    <div class="item-details">
	      	<h2 class="item-title">[title]</h2>
	      	<div class="half description pull-left">
	        	<div class="collapsible-desc">
	        	    <p>[description]</p>
	        	</div>                
	      	</div>
	      	<div class="half other-information pull-left">
	        	<h3>Cast:</h3>
	        	<p class="cast">[acf_cast]</p>
	        	<h3 class="legal-heading">Legal Notice</h3>
	        	<p>[acf_legal_notice]</p>
	        </div>
	      	<div class="clear"></div><!--clear floats-->
	    </div><!--item-details-->
  	</div><!--main-content-wrap-->

  	<!--START SINGLE ITEM CATALOG: NOTE: THIS CONTENT FROM HERE IS JUST A COPY OF CATALOG ITEMS -->
  	<div class="shows-listing innerpage-show-listing show-catalog">        
        <div class="main-tabs">
          <div class="shows-tab tab-trigger active-tab thirds to-uppercase pull-left text-center images-tab" data-target="images-tab-contents" data-sub-tabs="images-sub-tabs"><a href="#">Images</a></div>
          <div class="shows-tab tab-trigger thirds to-uppercase pull-left text-center documents-tab" data-target="documents-tab-contents" data-sub-tabs="documents-sub-tabs"><a href="#">Documents</a></div>
          <div class="shows-tab tab-trigger thirds to-uppercase pull-left text-center promo-tab" data-target="promo-tab-contents" data-sub-tabs="promo-sub-tabs"><a href="#">Promos</a></div>
        </div>
        
        <div class="clear red-bar-separator"></div> 
        <!-- To revert original sub tabs style, add " single-item-subtabs " in sub tabs wrapper and remove "fifths" and "pull-left" class on each sub tabs -->
        <!--START OF SUB TABS-->    
        <div class="sub-tabs-wrap images-sub-tabs fullwidth" data-parent-tab="images-tab">
          <div class="shows-tab tab-trigger sub-tabs to-uppercase pull-left text-center keyart-tab" id="key" data-target="keyart-tab-contents">
          <a href="#">Key Art</a>[file_count_key]</div>
          <div class="shows-tab tab-trigger sub-tabs to-uppercase pull-left text-center episodicstills-tab" id="epi" data-target="episodicstills-tab-contents">
          <a href="#">Episodic Stills</a>[file_count_epi]</div>
          <div class="shows-tab tab-trigger sub-tabs to-uppercase pull-left text-center gallery-tab" id="gallery" data-target="gallery-tab-contents">
          <a href="#">Gallery</a>[file_count_gallery]</div>    
          <div class="shows-tab tab-trigger sub-tabs to-uppercase pull-left text-center logos-tab" id="logo" data-target="logos-tab-contents">
          <a href="#">Logos</a>[file_count_logo]</div>    
          <div class="shows-tab tab-trigger sub-tabs to-uppercase pull-left text-center others-tab last-tab" id="oth" style="flex-basis: 8%;" data-target="others-tab-contents">
          <a href="#">Others - Special Web Assets etc</a>[file_count_oth]</div>    
          <div class="clear"></div> 
        </div><!-- subtabs-wrap -->   
         
        <div class="sub-tabs-wrap documents-sub-tabs fullwidth" data-parent-tab="documents-tab">
          <div class="shows-tab tab-trigger sub-tabs fifths to-uppercase pull-left text-center synopses-tab" id="synopsis" data-target="synopses-tab-contents">
          <a href="#">Synopses</a>[file_count_synopsis]</div>
          <div class="shows-tab tab-trigger sub-tabs fifths to-uppercase pull-left text-center epk-tab" id="transcript" data-target="epk-tab-contents">
          <a href="#">Transcripts/EPK</a>[file_count_transcript]</div>
          <div class="shows-tab tab-trigger sub-tabs fifths to-uppercase pull-left text-center factsheet-tab" id="fact" data-target="factsheet-tab-contents">
          <a href="#">Fact Sheet/Press Pack</a>[file_count_fact]</div>    
          <div class="shows-tab tab-trigger sub-tabs fifths to-uppercase pull-left text-center fonts-tab" id="font" data-target="fonts-tab-contents">
          <a href="#">Fonts</a>[file_count_font]</div>    
          <div class="shows-tab tab-trigger sub-tabs fifths to-uppercase pull-left text-center othersdocuments-tab" id="doth" data-target="othersdocuments-tab-contents">
          <a href="#">Others</a>[file_count_doth]</div>    
          <div class="clear"></div>     
        </div><!-- subtabs-wrap -->

        <div class="sub-tabs-wrap promo-sub-tabs fullwidth" data-parent-tab="promo-tab">
          <div class="clear"></div>     
        </div><!-- subtabs-wrap -->
        <!--END OF SUB TABS-->
                                          
        <div class="clear"></div><!-- this will maintain the flow of elements even if the next elements were set to float -->

        <div class="show-items-wrap images-tab-contents">
            <form id='table-key' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                    <input type='submit'  class="show-filter" value='Select All'>

                    <!-- custom days filter -->
                    <span class="recent-filter-text show-page">Display latest files in the last: </span>
                    [days_filter_dropdown]
        
                </div><!-- filter-wrap -->

                <div class='show-items'>
           		   [file_category,key]
           		   <div class='clear'></div>
           	    </div>
            </form>
        </div><!-- recent-tab-contents -->
        
        <div class="show-items-wrap keyart-tab-contents keyart-images">
            <form id='table-key' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                    <input type='submit'  class="show-filter" value='Select All'>

                    <!-- custom days filter -->
                    <span class="recent-filter-text show-page">Display latest files in the last: </span>
                    [days_filter_dropdown]

                </div><!-- filter-wrap -->
                <div class='show-items'>
              		[file_category,key]
              		<div class='clear'></div>
              	</div>
            </form>
        </div><!-- keyart-tab-contents -->

        <div class="show-items-wrap episodicstills-tab-contents">
            <p class="show-category-note">[acf_category_note]</p>
            <form id='table-epi' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                    <input type='submit'  class="show-filter" value='Select All'>

                    <!-- custom days filter -->
                    <span class="recent-filter-text show-page">Display latest files in the last: </span>
                    [days_filter_dropdown]

                    <select name="episode_code" id="episode_code" class="filter_select">
                        <option value='all'>All Episodes</option>
                    </select>
                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,epi]
                <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!-- episodicstills-tab-contents -->

        <div class="show-items-wrap gallery-tab-contents">
            <form id='table-gal' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                <input type='submit'  class="show-filter" value='Select All'>

                <!-- custom days filter -->
                <span class="recent-filter-text show-page">Display latest files in the last: </span>
                [days_filter_dropdown]

                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,gal]
                    <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!-- gallery-tab-contents -->

        <div class="show-items-wrap logos-tab-contents">
            <form id='table-log' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                <input type='submit'  class="show-filter" value='Select All'>

                <!-- custom days filter -->
                <span class="recent-filter-text show-page">Display latest files in the last: </span>
                [days_filter_dropdown]
            
                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,log]
                    <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!-- logos-tab-contents -->

        <div class="show-items-wrap others-tab-contents">
            <form id='table-oth' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                <input type='submit'  class="show-filter" value='Select All'>

                <!-- custom days filter -->
                <span class="recent-filter-text show-page">Display latest files in the last: </span>
                [days_filter_dropdown]

                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,oth]
                    <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!-- others-tab-contents -->

        <div class="show-items-wrap documents-tab-contents active-tab-content">
            <p class="show-category-note">[acf_category_note]</p>
            <form id='table-syn' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                    <input type='submit'  class="show-filter" value='Select All'>

                    <!-- custom days filter -->
                    <span class="recent-filter-text show-page">Display latest files in the last: </span>
                    [days_filter_dropdown]

                    <select name="synopsis_code" id="document_synopsis_code" class="filter_select synopsis_code">
                        <option value='all'>All Episodes</option>
                    </select>
                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,syn]
                <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div><!-- show-items -->
            </form>
        </div><!-- documents-tab-contents -->
        
        <div class="show-items-wrap synopses-tab-contents">
            <p class="show-category-note">[acf_category_note]</p>
            <form id='table-syn' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                    <input type='submit'  class="show-filter" value='Select All'>

                    <!-- custom days filter -->
                    <span class="recent-filter-text show-page">Display latest files in the last: </span>
                    [days_filter_dropdown]

                   <select name="synopsis_code" id="synopsis_code" class="filter_select synopsis_code">
                    <option value='all'>All Episodes</option>
                  </select>
                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,syn]
                    <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!-- synopses-tab-contents -->

        <div class="show-items-wrap epk-tab-contents">
            <form id='table-epk' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                    <input type='submit'  class="show-filter" value='Select All'>

                    <!-- custom days filter -->
                    <span class="recent-filter-text show-page">Display latest files in the last: </span>
                    [days_filter_dropdown]

                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,epk]
                    <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!-- epk-tab-contents -->

        <div class="show-items-wrap factsheet-tab-contents">
            <form id='table-fac' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                <input type='submit'  class="show-filter" value='Select All'>
                
                <!-- custom days filter -->
                <span class="recent-filter-text show-page">Display latest files in the last: </span>
                [days_filter_dropdown]

                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,fac]
                    <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!-- factsheettab-contents -->

        <div class="show-items-wrap fonts-tab-contents">
            <form id='table-fon' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                    <input type='submit'  class="show-filter" value='Select All'>
                
                    <!-- custom days filter -->
                    <span class="recent-filter-text show-page">Display latest files in the last: </span>
                    [days_filter_dropdown]

                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,fon]
                    <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!-- fonts-tab-contents -->

        <div class="show-items-wrap othersdocuments-tab-contents">
            <form id='table-doth' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                    <input type='submit'  class="show-filter" value='Select All'>
                
                    <!-- custom days filter -->
                    <span class="recent-filter-text show-page">Display latest files in the last: </span>
                    [days_filter_dropdown]

                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,doth]
                    <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!-- othersdocuments-tab-contents -->

        <div class="show-items-wrap promo-tab-contents">
            <form id='table-promo' class="table-files" method='post' >
                <div class="filter-wrap clear text-left">
                    <input type='submit'  class="show-filter" value='Select All'>
                
                    <!-- custom days filter -->
                    <!-- [days_filter_dropdown] -->

                </div><!-- filter-wrap -->
                <div class="show-items">
                    [file_category,promo]
                    <div class="clear"></div>  <!-- use to clear floats for show items, this will make this container full height -->    
                </div>
            </form>
        </div><!--promo-tab-contents -->
        
        <div class="clear"></div> <!-- use to clear floats for listing wrap, this will make this container full height -->  
      </div><!-- shows-listing -->
      <!--END OF THE SINGLE ITEM CATALOG-->
    
</div><!-- single-item-wrap -->

[custom_script]



