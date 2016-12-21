<?php 

/**
 * Template part Hiring Schedule Modal
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

// custom field specific to summer Program page
$hiring_schedule = get_field('hiring_schedule');
?>


<div id="summer-hiring-schedule" class="vellum black--vellum modal__background diversity hidden">
  <div class="row">
    <div class="diversity__modal--outer-wrapper table__wrapper relative">
      <div class="diversity__modal--inner-wrapper table__innner">
        <div class="diversity__modal--text-wrapper">
          <button class="close__modal cancel">
            
          </button>
          <p class="title__text text-align__center">
            2015 Schedule
          </p>
          <p class="body__text text-align__center">
            As part of our fall recruiting outreach, we visit a select group of schools and engage in on-campus interviews with top candidates.
          </p>
           <div class="div__half document__link">
            <p class="float__left">school</p>
          </div> 
          <div class="div__half document__link">
            <p class="float__right no__margin">oci date</p>
          </div>
           <?php foreach ($hiring_schedule as $hiring_date) { ?>
              <?php 
                $count = 0;
                foreach($hiring_date as $date) { ?>                  
                <div class="div__half "><p class="<?php if (++$count%2) { echo "float__left title__text smaller"; } else { echo "float__right bold__wide__spacing"; }?>"><?php echo $date;?></p></div>
              <?php }?>                 
            <?php }?>            
        </div>
      </div>  
    </div>
  </div>  
</div>