<?php
/**
 * ACF Section - Text Section
 */
?>
<style type="text/css">
	#text-section-<?php echo $section_counter; ?>{
    background-color: <?php the_sub_field('background_color'); ?>;
	  position: relative;
	}
  #text-section-<?php echo $section_counter; ?> h1,
  #text-section-<?php echo $section_counter; ?> h2,
  #text-section-<?php echo $section_counter; ?> h3,
  #text-section-<?php echo $section_counter; ?> p{
    color: <?php the_sub_field('text_color'); ?>;
  }
  #text-section-<?php echo $section_counter; ?> > .row{
    background: none;
  }
  #text-section-<?php echo $section_counter; ?> hr{
    border: none;
    border-bottom: 1px solid <?php the_sub_field('text_color'); ?>;
    padding-top: 30px;
		margin-bottom: 0;
  }
</style>
<div
  id="text-section-<?php echo $section_counter; ?>"
  class="section text-section <?php echo $is_full_width ? 'full-text-section' : ''; ?>"
	data-height="<?php the_sub_field('section_height_percentage'); ?>"
>
	<div class="row section-content">
		<div class="large-12 columns">

			<?php $header_only = get_sub_field('header_only'); ?>

      <?php if( get_sub_field('text_title') ): ?>
        <?php $header_count = 0; ?>
        <?php while( have_rows('text_title') ): the_row(); ?>
          <h1
            class="header-row-<?php echo $header_count; ?> text-left"
						style="padding-left:<?php the_sub_field('padding'); ?>px;<?php echo $header_only ? '' : 'font-weight:500;' ?>"
            ><?php echo get_sub_field('text'); ?>
          </h1>
          <?php $header_count++; ?>
        <?php endwhile; ?>
      <?php endif; ?>

			<?php if(!$header_only): ?>

        <?php if( get_sub_field('long_text') ): ?>
          <div class="row">
          <?php $long_text_count = 0; ?>
          <?php while( have_rows('long_text') ): the_row(); ?>
            <p
							class="long-text large-11 large-push-1 columns"
							style="padding-left:<?php the_sub_field('padding'); ?>px;"
						><?php echo get_sub_field('text'); ?>
						</p>
            <?php $long_text_count++; ?>
          <?php endwhile; ?>
				</div>
				<?php endif; ?>

	      <div class="row">
	        <?php if( get_sub_field('text_name') ): ?>
	          <h3 class="large-8 large-push-1 columns text-name"><?php echo get_sub_field('text_name'); ?></h3>
	        <?php endif; ?>

	        <?php if(get_sub_field('link')): ?>
	          <div class="large-3 columns buttonBoxDiv text-right">
	            <a href='<?php echo get_sub_field('link'); ?>' class="large buttonBox" target="_blank"><?php echo get_sub_field('button_text'); ?></a>
	          </div>
	        <?php endif; ?>
	      </div>

	      <?php if(get_sub_field('has_line')): ?>
	        <div class="row">
	          <div class="large-11 large-push-1 columns">
	            <hr>
	          </div>
	        </div>
	      <?php endif; ?>

			<?php endif; ?>

		</div>
	</div>
</div>
