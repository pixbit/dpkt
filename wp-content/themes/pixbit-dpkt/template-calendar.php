<?php
/**
 * Template Name: Calendar + Twitter
 */
get_header(); ?>

<?php if(get_field('sections')): ?>
	<div class="sections-wrapper">
		<?php
    $section_counter = 0;
  	while(has_sub_field('sections')):
  		include(locate_template('parts/section-'.get_row_layout().'.php'));
  		$section_counter++;
    endwhile;
    ?>
	</div><!-- .sections-wrapper -->
<?php endif; ?>

<div class="row">
	<div class="large-4 columns">
		<a class="twitter-timeline" href="https://twitter.com/DumpPhoKngTweet" data-widget-id="479963704759300096">Tweets by @DumpPhoKngTweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
	<div class="large-8 columns">
		<iframe src="https://www.google.com/calendar/embed?src=cl0e8oobrv7tiorl63dnau9p5g%40group.calendar.google.com&ctz=America/New_York" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe>
	</div>
</div>

<script charset="utf-8" type="text/javascript">
	$w = $(window);
	var image_count = 1;

	// Top Bar
	var is_header_visible = false;
	var is_scrolled_to_top = false;
	var header = $('header');
	var logo = $('#logo');
	var menu = $('ul.right');

	var headerHeight = $w.height()*(header.attr('data-height')/100);
	var logoHeight = .8*headerHeight;
	var menuHeight = .5*headerHeight;

	header.height(headerHeight);
	logo.height(logoHeight).css('margin-top', (headerHeight - logoHeight)/2);
	menu.height(menuHeight).css('margin-top', (headerHeight - menuHeight)/2);


	var boundSize = headerHeight;

	var leftZoneBound = boundSize;
	var rightZoneBound = $w.width() - boundSize;
	var upperZoneBound = boundSize;
	var lowerZoneBound = $w.height() - boundSize;

	var mousePos,
	counter = 0;

	if(header.hasClass('hide-top-bar')){
		hideHeader();

		$(window).scroll(function() {
		  if ($(this).scrollTop() > 0) {
		    showHeader();
		    is_scrolled_to_top = false;
		  } else {
		    hideHeader();
		    is_scrolled_to_top = true;
		  }
		});

		window.onmousemove = handleMouseMove;
	  setInterval(getMousePosition, 100); // setInterval repeats every X ms
	}

	/////////////////////
	// Mouse Detection //
	/////////////////////
	function handleMouseMove(event) {
	  event = event || window.event; // IE-ism
	  mousePos = {
	    x: event.clientX,
	    y: event.clientY
	  };
	}

	function getMousePosition() {
	  var pos = mousePos;
	  if (!pos) { pos = {x: "?", y: "?"}; }

	  if(pos.y < (upperZoneBound - 10)){
			if(is_scrolled_to_top) showHeader();
	  }else{
	  	// if($(window).scrollTop() !== 0) hideHeader();
	  	if(is_scrolled_to_top) hideHeader();
	  }
	}

	////////////////////
	// Header Toggles //
	////////////////////
	function showHeader(){
	  $('header').css('opacity', '1');
	  is_header_visible = true;
	}

	function hideHeader(){
		if(!is_scrolled_to_top){
		  $('header').css('opacity', '0');
		  is_header_visible = false;
		}
	}

	$('body').imagesLoaded()
  .always( function( instance ) {
    // console.log('all images loaded');
		// Blue Section
		$('.section-content').each(function(){
				var content = $(this);
				var section = content.parent();
				var sectionHeight = $w.height()*(section.attr('data-height')/100);
				var extraSpace = sectionHeight - content.outerHeight();

				if(extraSpace > 0){
					content.parent().css('height', sectionHeight).css('padding-top', extraSpace/2);
				}else{
					console.log('\nContent is taller than actual section.');
					console.log(section.attr('id') + ' sectionHeight: ' + sectionHeight);
					console.log(section.attr('id') + ' extraSpace: ' + extraSpace);
					console.log(section.attr('id') + ' padding-top: ' + content.parent().css('padding-top'));
				}
		});
		// Featured Image
		$('.sections-wrapper .section .caption-and-button').each(function(){
				var capBtn = $(this);
				var section = capBtn.parent();
				var sectionHeight = $w.height()*(section.attr('data-height')/100);
				var capBtnHeight = sectionHeight - capBtn.height();

				capBtn.css('padding-top', capBtnHeight*.75);
				capBtn.css('padding-bottom', capBtnHeight*.25);
				capBtn.css('height', sectionHeight);
		});
  })
  .done( function( instance ) {
    // console.log('all images successfully loaded');
  })
  .fail( function() {
    // console.log('all images loaded, at least one is broken');
  })
  .progress( function( instance, image ) {
    var result = image.isLoaded ? 'loaded' : 'broken';
    // console.log( 'image is ' + result + ' for ' + image.img.src );
    if(image_count == 1){
		}else if(image_count == $('body img').length){
			is_finished_loading = true;
		}else{
			// NProgress.set( image_count/$('body img').length );
    }
    // console.log( image_count + '/' + $('body img').length );
    image_count++;
  });

	console.log(image_count);
</script>

<?php wp_footer(); ?>
</body>
</html>
