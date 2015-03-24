$w = $(window);

viewportWidth = $w.width();
viewportHeight = $w.height();

textSectionHeight = viewportHeight*(.56);

var textRow = $('.header-rows');
var textSection = $('.text-section');
var extraSpace = textSection.outerHeight() - textRow.outerHeight();

console.log('textSectionHeight: ' + textSection.outerHeight());
console.log('textRow: ' + textRow.outerHeight());
console.log('extraSpace: ' + extraSpace);

textRow.parent().css('padding-top', extraSpace/2);
