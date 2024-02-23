$(document).ready(function () {
    $(".catalog_btn").click(function () {
        console.log("click");
        var photoPath = $(this).data("photo");
        $("#modalImage").attr("src", photoPath);
        $("#photoModal").show();
    });

    $(".close, #photoModal").click(function () {
        $("#photoModal").hide();
    });
});

$(document).ready(function () {
    $("#add").click(function () {
        $("#addForm").toggle();
    });
});

$(document).ready(function () {
    $("#photo-upload").click(function () {
        $("#file-upload").trigger("click");
    });

    $("#file-upload").change(function () {
        var fileName = $(this).val().split("\\").pop();
        $("#file-name").text(fileName);
    });
});
