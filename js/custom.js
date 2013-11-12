jQuery(document).ready(function ($) {

// Share bar
if ($('body').hasClass('single')) {
  var timeout = null; var entryShare = $('#social-widgets').first(); var entryContent =$('.entry-content').first();
  $(window).scroll(function () {
    var scrollTop = $(this).scrollTop();
    if(!timeout) {
      timeout = setTimeout(function() { timeout = null;
        if (entryShare.css('position') !== 'fixed' && entryShare.offset().top < $(document).scrollTop()) {
          entryContent.css('padding-top', entryShare.outerHeight() + 8);
          entryShare.css({'z-index': 500, 'position': 'fixed', 'top': 0, 'width': entryContent.width()});
        } else if ($(document).scrollTop() <= entryContent.offset().top) {
          entryContent.css('padding-top', '');
          entryShare.css({ 'position': '', 'z-index': '', 'width': ''});
        }
      }, 250);
    }
  });
}

   $(document).ready(function () {
        $('#social-widgets .print-icon a').click(function () {
            window.print();
            return false;
        });
    });

  // <- -> Keyboard navigation
  $(window).keydown(function (e) {
    var url = null;
    if (e.which === 37) { url = $('.navigation .alignleft a').attr('href'); }
    else if (e.which === 39) { url = $('.navigation .alignright a').attr('href'); }
    if(url) { window.location = url; }
  });
  
});  