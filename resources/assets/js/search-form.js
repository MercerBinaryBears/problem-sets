$(function() {
  $('form[data-search-form]').on('submit', function() {
    var query = {};

    var $name = $('[name=name]');
    if($name.length > 0) {
      query.name = $name.val();
    }

    var $tags = $('[name=tags]');
    if($tags.length > 0) {
      query.tags = $tags.val().join(',');
    }

    var url = $(this).attr('action') + '?' + $.param(query);
    window.location = url;
    return false;
  });
});
