$("#popoverAyuda").popover({
    html: true,
    placement: "right",
    trigger: "hover",
    title: function () {
        return $(".pop-title").html();
    },
    content: function () {
        return $(".pop-content").html();
    }
});
