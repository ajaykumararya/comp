document.addEventListener('DOMContentLoaded', async function () {
$(".parent-input").click(function () {
    
    $(this).closest('.arya-menu').find('.child-input,.parent-child').prop("disabled", !$(this).is(":checked"));
    // if($(this).hasClass('par-input'))
      // $(this).closest('.arya-menu').find('.parent-child').prop('disabled',$(this).is(":checked"));
  });
});