<?php
/**
 * Template part off canvas search
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$alphabet = range('A', 'Z');
?>

 <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
          <?php get_header();?>
          <div class="off-canvas position-right search__people__off__canvas__container" id="offCanvas" data-off-canvas data-position="right" data-options="sticky_on: large">
             <button class="close-button reverse--button" aria-label="Close menu" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="search__people__off__canvas">
              <div id="search__people__letter__grid" class="padding-top-20">
              <p class="title__text padding-top-20">Search People</p>
              <p class="search__people__homepage">Search by last name</p>
                <?php $count = 0; foreach ($alphabet as $letter) { $count++?>
                <div class="columns medium-3 large-3 small-3 <?php if ($count == 26) {?> float-left  <?php };?>letter__link--outer-wrapper">
                  <div class="letter__link--inner-wrapper letter--active offcanvas--letter--link--wrapper">
                    <a href="<?php echo '/all-people#'.$letter;?>" data-letter="<?php echo $letter;?>" class="offcanvas--letter--link letter__link white">
                      <?php echo $letter;?>
                    </a>
                  </div>
                </div>            
            <?php }; ?>  
                <div class="columns small-12">
                  <a href="/all-people/"><p id="all__people__navigate">see all people</p></a>
                </div>
                <div id="search__by__keyword" class="columns small-12 ">
                  <form id="search__people">  
                    <div id="homepage__search__svg">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.21 46.21"><defs><style>.cls-1-homepage,.cls-2-homepage {fill:none; stroke:#fff; stroke-miterlimit:10;stroke-width:6px;}.cls-2-homepage{ stroke:#fff; stroke-linecap:round;}</style></defs><title>Asset 3</title><g id="Layer_2" data-name="Layer 2"><g id="icons"><circle class="cls-1-homepage" cx="19" cy="19" r="16"/><line class="cls-2-homepage" x1="30.35" y1="30.27" x2="43.21" y2="43.21"/></g></g></svg>
                    </div>
                    <input type="text" id="search-by-keyword" class="margin-bottom--20" placeholder="Search By Keyword">
                    <input type="submit" id="submit-keyword-search" value="Search">
                  </form>             
                </div>  
              </div>
            </div>
          </div>
          <div class="off-canvas-content" data-off-canvas-content>
          <div class="human-icon" data-toggle="offCanvas"></div>