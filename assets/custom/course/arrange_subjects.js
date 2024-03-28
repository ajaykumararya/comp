document.addEventListener('DOMContentLoaded', function (e) {
    const courseBOx = $('select[name="course_id"]');
    const listSubjectBox = $('.list-subjects-box');
    const form = $("#arrange_subjects");
    form.on('submit', function(d){
        d.preventDefault();
        var course_id = courseBOx.val();
        var sortedIds = $(".items").sortable("toArray", { attribute: "data-id" });
        $.AryaAjax({
            data : { sortedIds,course_id },
            url : 'course/update-arrange-subject',
            success_message : 'Subjects Sorted Successfully..'
        }).then(  (d) => log(d));
    })
    courseBOx.select2({
        placeholder: 'Select Course'
    });
    courseBOx.on('change', function () {
        var id = $(this).val();
        listSubjectBox.html('');

        $.AryaAjax({
            'url': 'course/list-subjects-html',
            'data': { id }
        }).then((d) => {
            listSubjectBox.html(d.html).find('.items').sortable({
                start: function (event, ui) {
                    // Temporarily move the dragged item to the end of the list so that it doesn't offset the items
                    // below it (jQuery UI adds a 'placeholder' element which creates the desired offset during dragging)
                    $(ui.item).appendTo(this).addClass("dragging");
                },
                stop: function (event, ui) {
                    // jQuery UI instantly moves the element to its final position, but we want it to transition there.
                    // So, first convert the final top/left position into a translate3d style override
                    var newTranslation = "translate3d(" + ui.position.left + "px, " + ui.position.top + "px, 0)";
                    $(ui.item).css("-webkit-transform", newTranslation)
                        .css("transform", newTranslation);
                    // ... then remove that override within a snapshot so that it transitions
                    $(ui.item).snapshotStyles().removeClass("dragging").releaseSnapshot();
                }
            }).on("webkitTransitionEnd", function () {
                $(this).hide().offset();
                $(this).show();
            });
            createListStyles(".items li:nth-child({0})", 50, 1);
        });
    })

})