

$('.swatch-clickable').each(function () {
    $(this).attr('title', $(this).attr('id'));
});
// $('.swatch-clickable').tooltip();

$(".swatch-clickable").click(function() {
  $("#preview").css('background-color', $(this).css('background-color'));
  $("#color-name").html($(this).attr("id"));
  $("#color-field").val($(this).attr("id"))
});