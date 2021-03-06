(function() {
  var showingClass = 'is-showing';

  var toggle = function(evt) {
    var $button = $(this);

    if($button.hasClass(showingClass)) {
      $button.parent().find('iframe').remove();
      $button.removeClass(showingClass);
      return false;
    }

    var iframeAttributes = {
      width: '200px',
      height: '200px',
      src: $button.data('url')
    };
    $('<iframe/>').attr(iframeAttributes).appendTo($button.parent());
    $button.html('Hide').addClass(showingClass);
    return false;
  };

  $(function() {
    $('.toggle-button').on('click', toggle);
  });
})();
