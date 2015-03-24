<?php
/**
 * ACF Section - Info Section
 */
?>
<style type="text/css">
  #info-section-<?php echo $section_counter; ?>{
    background-color: <?php the_sub_field('background_color'); ?>;
    position: relative;
  }
  #info-section-<?php echo $section_counter; ?> h1,
  #info-section-<?php echo $section_counter; ?> h2,
  #info-section-<?php echo $section_counter; ?> h3,
  #info-section-<?php echo $section_counter; ?> p{
    color: <?php the_sub_field('text_color'); ?>;
  }
</style>
<div
  id="info-section-<?php echo $section_counter; ?>"
  class="section info-section"
  data-height="<?php the_sub_field('section_height_percentage'); ?>"
>
  <div class="row section-content">
    <div class="large-12 columns">
    		<?php if(have_rows('paragraphs')): ?>
    			<?php while(have_rows('paragraphs')): the_row(); ?>
    				<div class="list-block">
    					<h2><?php echo get_sub_field('paragraph_title'); ?></h2>
    					<p><?php echo get_sub_field('paragraph_text'); ?></p>
    				</div>
    			<?php endwhile; // $paragraphs ?>
    		<?php endif; // $paragraphs ?>
      </div><!-- .row -->

    		<?php if(have_rows('lists')): ?>
    			<?php while(have_rows('lists')): the_row(); ?>
    				<div class="large-6 columns list-block <?php echo get_sub_field('list_title') ? 'has-list-title' : 'no-list-title'; ?>">
    					<?php if(get_sub_field('list_title')): ?>
    						<h2><?php echo get_sub_field('list_title'); ?></h2>
    					<?php endif; ?>
    						<ul class="<?php echo get_sub_field('list_title') ? 'has-list-title' : 'no-list-title'; ?> info-list">
    					<?php if(have_rows('list_items')): ?>
    						<?php while(have_rows('list_items')): the_row(); ?>
    							<li><span><?php echo get_sub_field('text'); ?></span></li>
    						<?php endwhile; ?>
    					<?php endif; // $list_items ?>
    						</ul>
    				</div>
          <?php $is_first_list = false; ?>
    			<?php endwhile; // $lists ?>
    		<?php endif; // $lists ?>

    </div><!-- .large-12 -->
  </div><!-- .row -->
</div><!-- .info-section -->
