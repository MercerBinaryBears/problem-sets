$(function() {
  $('form[data-search-form]').on('submit', function() {
    var $form = $(this);

    var query = {};

    var $name = $('[name=name]', $form);
    if($name.length > 0) {
      query.name = $name.val();
    }

    var $tags = $('[name=tags]', $form);
    if($tags.length > 0) {
      query.tags = $tags.val().join(',');
    }

    var $problemCount = $('[name=problem_count]', $form);
    if($problemCount.length > 0) {
      query.problem_count = $problemCount.val();
    }

    var url = $(this).attr('action') + '?' + $.param(query);
    window.location = url;
    return false;
  });
});
