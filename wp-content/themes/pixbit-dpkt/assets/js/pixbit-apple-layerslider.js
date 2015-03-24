function setupHeader(url){
  var header_slideshow_options = {
      autoPlayVideos: false,
      showCircleTimer: false,
      // navStartStop: false,
      thumbnailNavigation: 'disabled',
      // pauseOnHover: false,
      skin: 'fullwidth',
      skinsPath: url
  };

  $w = $(window);
  headerHeight = $w.height()*(.60);

  $('#header-slideshow-ls').css('min-height', headerHeight);
  
  $('.video-player').each(function(){
    var iframe = $(this);
    iframe.attr('min-height', headerHeight);
    iframe.attr('width', viewportWidth);

    $(this).parent().hide();
  });

  $('#header-slideshow-ls').layerSlider(header_slideshow_options);
}

// Call the API when a button is pressed
function enableVideo(){
  $('.play-vimeo').each(function(){
    $(this).bind('click', function() {
      var regexp = new RegExp('#','g');
      var video_id = $(this).attr('href').replace(regexp, '');
      var player = $f($('#vimeo-'+video_id)[0]);

      // When the player is ready, add listeners for pause, finish, and playProgress
      player.addEvent('ready', function() {
        player.addEvent('pause', onPause);
        player.addEvent('finish', onFinish);
        player.addEvent('playProgress', onPlayProgress);
      });

      $('#vimeo-'+video_id).css('position', 'absolute');
      $('#player-'+video_id).show();
      player.api('play');
      $('#header-slideshow-ls').layerSlider('stop');
      $('.ls-nav-prev, .ls-nav-next').hide();
    });
  });
}

function onPause(id) {
  console.log('paused');
}

function onFinish(id) {
  console.log('finished '+ id);

  var regexp = new RegExp('vimeo-','g');
  var video_id = id.replace(regexp, '');
  $('#player-'+video_id).hide();
  $('#header-slideshow-ls').layerSlider('start');
  $('.ls-nav-prev, .ls-nav-next').show();
}

function onPlayProgress(data, id) {
  console.log(data.seconds + 's played');
}
