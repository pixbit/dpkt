<?php
/**
 * ACF Section - Multi-image
 *
 * Can be 2 or 3 pictures.
 */
?>
<?php
	$images = array();
	while(have_rows('image_blocks')): the_row();
		array_push($images, get_sub_field('image_block'));
	endwhile;
?>

<style type="text/css">
  #centered-photo-blocks-section-<?php echo $section_counter; ?>{
    background-color: <?php the_sub_field('background_color'); ?>;
  }
  #centered-photo-blocks-section-<?php echo $section_counter; ?> h1,
  #centered-photo-blocks-section-<?php echo $section_counter; ?> h2,
  #centered-photo-blocks-section-<?php echo $section_counter; ?> h3,
  #centered-photo-blocks-section-<?php echo $section_counter; ?> a,
  #centered-photo-blocks-section-<?php echo $section_counter; ?> p{
    color: <?php the_sub_field('text_color'); ?>;
  }
  #centered-photo-blocks-section-<?php echo $section_counter; ?> a{
    border-color: <?php the_sub_field('link_border_color'); ?>;
  }
</style>
<?php if(count($images) > 0): ?>
	<div
		id="centered-photo-blocks-section-<?php echo $section_counter; ?>"
		class="centered-photo-blocks-section section"
		data-height="<?php the_sub_field('section_height_percentage'); ?>"
	>
		<div class="section-content">
      <?php $device_count = 1; ?>
      <?php if(get_sub_field('upper_caption')): ?>
        <p class="text-center upper-caption"><?php the_sub_field('upper_caption'); ?></p>
      <?php endif; ?>
      <ul class="device-images">
      <?php while(have_rows('image_blocks')): the_row(); ?>
				<?php $image_block = get_sub_field('image_block'); ?>
        <li>
          <img
						src="<?php echo $image_block['url']; ?>"
						style="padding-bottom:<?php echo get_sub_field('image_caption') ? '20px' : '0' ?>;"
					/>
          <?php if(get_sub_field('image_caption')): ?>
            <p><?php the_sub_field('image_caption'); ?></p>
          <?php endif; ?>
        </li>
        <?php $device_count++; ?>
			<?php endwhile; ?>
      </ul>
      <?php if(get_sub_field('lower_caption')): ?>
        <p class="text-center lower-caption"><?php the_sub_field('lower_caption'); ?></p>
      <?php endif; ?>

      <?php if(get_sub_field('link')): ?>
        <div class="text-center link">
          <a
						href='<?php echo get_sub_field('link'); ?>'
						class="large buttonBox"
					><?php echo get_sub_field('button_text'); ?></a>
        </div>
      <?php endif; ?>
		</div><!-- .inner-block -->
	</div>

<?php endif; ?>
