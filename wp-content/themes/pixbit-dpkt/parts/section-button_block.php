<?php
/**
 * ACF Section - Button Section
 */
?>
<?php
	$is_full_width = get_sub_field('is_full_width');
	$background_image = get_sub_field('background_image');
?>
<style type="text/css">
	#button-section-<?php echo $section_counter; ?>{
    <?php if($background_image && $is_full_width): ?>
  		background-image: url(<?php echo $background_image['url']; ?>);
  	  background-position: center top;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    <?php endif; ?>
    background-color: <?php the_sub_field('background_color'); ?>;
	  position: relative;
	}
  #button-section-<?php echo $section_counter; ?> h1,
  #button-section-<?php echo $section_counter; ?> h2,
  #button-section-<?php echo $section_counter; ?> h3,
  #button-section-<?php echo $section_counter; ?> p{
    color: <?php the_sub_field('text_color'); ?>;
  }
  #button-section-<?php echo $section_counter; ?> > .row{
    <?php if($background_image && !$is_full_width): ?>
      background-image: url(<?php echo $background_image['url']; ?>);
      background-position: center top;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    <?php else: ?>
      background: none;
    <?php endif; ?>
  }
  #button-section-<?php echo $section_counter; ?> .caption-and-button{
  }
  #button-section-<?php echo $section_counter; ?> hr{
    border: none;
    border-bottom: 1px solid <?php the_sub_field('text_color'); ?>;
		padding-top: 30px;
  }
</style>
<div
	id="button-section-<?php echo $section_counter; ?>"
	class="section button-section <?php echo $background_image ? 'bg-img' : ''; ?>
	<?php echo $is_full_width ? 'full-button-section' : ''; ?>"
	data-height="<?php the_sub_field('section_height_percentage'); ?>"
>
  <?php $header_icon = get_sub_field('header_icon'); ?>
  <div class="row caption-and-button section-content">
    <?php if(get_sub_field('link')): ?>
      <div class="large-2 large-push-1 columns button-container">
        <a href='<?php echo get_sub_field('link'); ?>' class="large buttonBox"><?php echo get_sub_field('button_text'); ?></a>
      </div>
    <?php endif; ?>

		<?php if(get_sub_field('header') && get_sub_field('subheader')): ?>
	    <div class="<?php echo !get_sub_field('link') ? 'large-push-7 ' : ''; ?>large-5 columns caption-container">
	      <span style="color: <?php the_sub_field('icon_color'); ?>;"
	      >{</span>
	      <h1 style="color: <?php the_sub_field('text_color'); ?>;"><?php the_sub_field('header'); ?></h1>
	      <h2 style="color: <?php the_sub_field('text_color'); ?>;"><?php the_sub_field('subheader'); ?></h2>
	    </div>
		<?php endif; ?>
  </div>
</div>
