<?php while(have_rows('header_slideshow')): the_row(); ?>
  <?php if(get_sub_field('video_id')): ?>
    <div id='player-<?php echo get_sub_field('video_id'); ?>' class="player">
      <iframe id='vimeo-<?php echo get_sub_field('video_id'); ?>' class="video-player" src="//player.vimeo.com/video/<?php echo get_sub_field('video_id'); ?>?portrait=0&amp;color=e68825&amp;player_id=vimeo-<?php echo get_sub_field('video_id'); ?>&amp;api=1&amp;autoplay=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
  <?php endif; ?>
<?php endwhile; ?>

<?php if(have_rows('header_slideshow')): ?>
  <div id="header-slideshow-ls" class="layerslider" style="height:100%; width:100%;">
    <?php $slide_count = 0; ?>
    <?php while(have_rows('header_slideshow')): the_row(); ?>
        <?php $image = get_sub_field('image'); ?>
        <div class="ls-slide" data-ls="slidedelay: 3000; transition2d: 5;">
          <?php if($image): ?>
            <img src="<?php echo $image['url']; ?>" class="ls-bg" style="width:100;">
          <?php endif; ?>

          <?php if(get_sub_field('type') == 'image'): ?>
            <?php if(get_sub_field('link')): ?>
              <div class="ls-l" data-ls="offsetxin: 0; offsetyin: 0; offsetxout: 0; offsetyout: 0; transformoriginin: 0; transformoriginout: 0;" style="top: 75%; left: 10%;">
                <a
                  data-ls="offsetxin:100;offsetyin:0;durationin:2000;"
                  style="
                  top: 75%;
                  left: 25%;
                  overflow:hidden;
                  font-size: 21px;
                  font-family: 'Whitney';
                  font-style: italic;
                  font-weight: bold;
                  line-height: 1;"
                  class="ls-l text-center large buttonBox"
                  href='<?php echo get_sub_field('link'); ?>'
                  target="_blank"
                ><?php echo get_sub_field('button_text'); ?>
                </a>
              </div><!-- .ls-l -->
            <?php endif; ?>

          <?php elseif(get_sub_field('type') == 'video'): ?>

            <?php if(get_sub_field('video_id')): ?>
              <div class="ls-l" data-ls="offsetxin: 0; offsetyin: 0; offsetxout: 0; offsetyout: 0; durationin: 0;" style="top: 75%; left: 10%;">
                <a
                  data-ls="offsetxin:100;offsetyin:0;durationin:2000;"
                  style="
                  top: 75%;
                  left: 25%;
                  overflow:hidden;
                  font-size: 21px;
                  font-family: 'Whitney';
                  font-style: italic;
                  font-weight: bold;
                  line-height: 1;"
                  class="ls-l text-center play-vimeo large buttonBox"
                  href='#<?php echo get_sub_field('video_id'); ?>'
                ><?php echo get_sub_field('button_text'); ?>
                </a>
              </div><!-- .ls-l -->
            <?php endif; ?>

          <?php endif; ?>

          <?php if(get_sub_field('header')): ?>
            <?php $header_icon = get_sub_field('header_icon'); ?>

            <div
              class="ls-l"
              data-ls="offsetxin:100;offsetyin:0;durationin:2000;"
              style="top: 75%; left: 75%; width: 30%; overflow:hidden;"
            >
              <span style="
                color: <?php the_sub_field('icon_color'); ?>;
                width: 30px;
                padding-right: 15px;
                float: left;
                font-size: 71px;
                font-family: 'Whitney';
                font-style: italic;
                font-weight: bold;
                "
              >{</span>

              <h1 style="
                color: <?php the_sub_field('text_color'); ?>;
                font-size: 30px;
                font-family: 'Whitney';
                font-style: italic;
                font-weight: bold;
                padding-top: 11px;
                line-height: 1;
                "
              ><?php echo get_sub_field('header'); ?>
              </h1>

              <h2 style="
                color: <?php the_sub_field('text_color'); ?>;
                text-transform: uppercase;
                font-size: 19px;
                font-family: 'Whitney';
                font-style: italic;
                padding-top: 3px;
                line-height: 1;
                "
              ><?php echo get_sub_field('subheader'); ?>
              </h2>
           </div><!-- .ls-l -->

          <?php endif; ?>


        </div><!-- .ls-slide -->
    <?php $slide_count++; ?>
    <?php endwhile; ?>
  </div><!-- #header-slideshow-ls -->
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function(){
  // setupHeader(<?php echo "'". get_stylesheet_directory_uri() ."/bower_components/layerslider/layerslider/skins/'"; ?>);
  // enableVideo();
});
</script>
