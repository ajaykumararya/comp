document.addEventListener('DOMContentLoaded', function (e) {
    const form = document.getElementById('save-schema');
    form.addEventListener('submit', function(d){
        d.preventDefault();
        var sortedIds = $(".items").sortable("toArray", { attribute: "data-id" });
        $.AryaAjax({
            data : { sortedIds },
            url : 'cms/update_page_schema',
            success_message : 'Page`s Events Sorted Successfully..'
        }).then(  (d) => log(d));
    })
    $(".items").sortable({
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
    });
    // Workaround for Webkit bug: force scroll height to be recomputed after the transition ends, not only when it starts
    $(".items").on("webkitTransitionEnd", function () {
        $(this).hide().offset();
        $(this).show();
    });
});

createListStyles(".items li:nth-child({0})", 50, 1);
// Snapshotting utils
