$(function() {
  var $originalSelect = $('select[data-chosen]');

  // automatically wire-up chosen
  $originalSelect.chosen();

  // remove chosen's hard-coded width, and attach classes
  $originalSelect.next().attr('style', '').addClass($originalSelect.attr('class'));
});
