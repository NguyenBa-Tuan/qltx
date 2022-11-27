require("./bootstrap");

// $(".btn.btn-default.btn-danger").click(() => {
//     alert("xoa nhe hihi !");
// });

$(".show-edit-vehicle").click(function () {
    $(this).parent().find(".edit-vehicle").show();
    $(".show-popup__loading").css("display", "block");
});

$(".hide-edit-vehicle").click(() => {
    $(".edit-vehicle").hide();
    $(".show-popup__loading").css("display", "none");
});

$(".edit-vehicle input.image").on("change", function () {
    $(this).parent().find("img").remove();
});
