$(document).ready(function(){

  //$('.ui.dropdown').dropdown();
	$('.ui.dropdown.fluid').dropdown();
  //$('.ui.dropdown').dropdown({on: 'hover', transition: 'drop'});

  $('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  });


	 // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        });

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item');


});