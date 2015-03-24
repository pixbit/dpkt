<?php
/**
 * ACF Section - Photo Blocks Section
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
  #photo-blocks-section-<?php echo $section_counter; ?>{
    background-color: <?php the_sub_field('background_color'); ?>;
  }
</style>
<?php if(count($images) > 0): ?>
	<div id="photo-blocks-section-<?php echo $section_counter; ?>" class="photo-blocks-section">
	<?php if(!get_sub_field('is_full_width')): ?><div class='row'><?php endif; ?>
		<ul class="large-block-grid-<?php echo count($images); ?>">
			<?php while(have_rows('image_blocks')): the_row(); ?>
				<?php $image_block = get_sub_field('image_block'); ?>
			  <li><img src="<?php echo $image_block['url']; ?>" /></li>
			<?php endwhile; ?>
		</ul>
  <?php if(!get_sub_field('is_full_width')): ?></div><!-- .row --><?php endif; ?>
	</div>
<?php endif; ?>
