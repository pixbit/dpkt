jQuery(function() {
  var heights = [];

  jQuery('.alt-table-row').each(function(){
    heights.push(jQuery(this).height());
  });

  var min_height = _.first(_.drop(_.sortBy(heights)));

  jQuery('.alt-table-row').each(function(){
    jQuery(this).height(min_height);
  });
});
