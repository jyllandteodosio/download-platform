<!-- WPDM Template: Plain Custom Template -->
 <div class="innerpage-heading-bar">
         <h1 class="page-title">[title]</h1>
         [searchform]
      </div><!--innerpage-heading-bar-->
      <div class="clear"></div>   

      <div class="shows-listing innerpage-show-listing show-catalog">
        <div class="main-tabs">
          <div class="shows-tab tab-trigger active-tab half to-uppercase pull-left text-center documents-tab" data-target="channelepg-tab-contents" data-sub-tabs="documents-sub-tabs"><a href="#">Documents</a></div>
          <div class="shows-tab tab-trigger half to-uppercase pull-left text-center images-tab" data-target="channellogos-tab-contents" data-sub-tabs="images-sub-tabs"><a href="#">Images</a></div>
        </div>
        <div class="clear red-bar-separator"></div>    

        <div class="sub-tabs-wrap documents-sub-tabs fullwidth" data-parent-tab="documents-tab">
          <div class="shows-tab tab-trigger sub-tabs quarters to-uppercase pull-left text-center channelepg-tab" data-target="channelepg-tab-contents"><a href="#">EPG</a></div>
          <div class="shows-tab tab-trigger sub-tabs quarters to-uppercase pull-left text-center channelhighlights-tab" data-target="channelhighlights-tab-contents"><a href="#">Highlights</a></div>
          <div class="shows-tab tab-trigger sub-tabs quarters to-uppercase pull-left text-center channelbrand-tab" data-target="channelbrand-tab-contents"><a href="#">Brand Guide</a></div>    
          <div class="shows-tab tab-trigger sub-tabs quarters to-uppercase pull-left text-center channelboiler-tab" data-target="channelboiler-tab-contents"><a href="#">Boiler Plates</a></div>    
          <div class="clear"></div>     
        </div><!-- subtabs-wrap -->  

        <div class="sub-tabs-wrap images-sub-tabs fullwidth" data-parent-tab="images-tab">
          <div class="shows-tab tab-trigger sub-tabs thirds to-uppercase pull-left text-center channellogos-tab" data-target="channellogos-tab-contents"><a href="#">Logos</a></div>
          <div class="shows-tab tab-trigger sub-tabs thirds to-uppercase pull-left text-center channelelements-tab mid-tab" data-target="channelelements-tab-contents"><a href="#">Elements</a></div>
          <div class="shows-tab tab-trigger sub-tabs thirds to-uppercase pull-left text-center channelothers-tab" data-target="channelothers-tab-contents"><a href="#">Others</a></div>    
          <div class="clear"></div>     
        </div><!-- subtabs-wrap -->                 
        <div class="clear"></div><!-- this will maintain the flow of elements even if the next elements were set to float -->

        <div class="show-items-wrap channelepg-tab-contents">
          <form id='table-cm_epg' class="table-files" method='post' >
            <div class="filter-wrap clear text-left">
              <input type='submit'  class="show-filter" value='Select All'>
            </div><!-- filter-wrap -->
            <div class='show-items'>
           		[file_category,cm_epg]
           		<div class='clear'></div>
           	</div>
          </form>
        </div><!-- channelepg-tab-contents -->

        <div class="show-items-wrap channelhighlights-tab-contents">
          <form id='table-cm_hig' class="table-files" method='post' >
            <div class="filter-wrap clear text-left">
              <input type='submit'  class="show-filter" value='Select All'>
            </div><!-- filter-wrap -->
            <div class='show-items'>
           		[file_category,cm_hig]
           		<div class='clear'></div>
           	</div>
          </form>
        </div><!-- channelhighlights-tab-contents -->

        <div class="show-items-wrap channelbrand-tab-contents">
          <form id='table-cm_bra' class="table-files" method='post' >
            <div class="filter-wrap clear text-left">
              <input type='submit'  class="show-filter" value='Select All'>
            </div><!-- filter-wrap -->
            <div class='show-items'>
           		[file_category,cm_bra]
           		<div class='clear'></div>
           	</div>
          </form>
        </div><!-- channelbrand-tab-contents -->

        <div class="show-items-wrap channelboiler-tab-contents">
          <form id='table-cm_boi' class="table-files" method='post' >
            <div class="filter-wrap clear text-left">
              <input type='submit'  class="show-filter" value='Select All'>
            </div><!-- filter-wrap -->
            <div class='show-items'>
           		[file_category,cm_boi]
           		<div class='clear'></div>
           	</div>
          </form>
        </div><!-- channelboiler-tab-contents -->

        <div class="show-items-wrap channellogos-tab-contents">
          <form id='table-cm_log' class="table-files" method='post' >
            <div class="filter-wrap clear text-left">
              <input type='submit'  class="show-filter" value='Select All'>
            </div><!-- filter-wrap -->
            <div class='show-items'>
           		[file_category,cm_log]
           		<div class='clear'></div>
           	</div>
          </form>
        </div><!-- channelboiler-tab-contents -->

        <div class="show-items-wrap channelelements-tab-contents">
          <form id='table-cm_ele' class="table-files" method='post' >
            <div class="filter-wrap clear text-left">
              <input type='submit'  class="show-filter" value='Select All'>
            </div><!-- filter-wrap -->
            <div class='show-items'>
           		[file_category,cm_ele]
           		<div class='clear'></div>
           	</div>
          </form>
        </div><!-- channelboiler-tab-contents -->

        <div class="show-items-wrap channelothers-tab-contents">
          <form id='table-cm_oth' class="table-files" method='post' >
            <div class="filter-wrap clear text-left">
              <input type='submit'  class="show-filter" value='Select All'>
            </div><!-- filter-wrap -->
            <div class='show-items'>
           		[file_category,cm_oth]
           		<div class='clear'></div>
           	</div>
          </form>
        </div><!-- channelboiler-tab-contents -->

        <div class="clear"></div> <!-- use to clear floats for listing wrap, this will make this container full height -->  
      </div><!-- shows-listing -->

[custom_script]



