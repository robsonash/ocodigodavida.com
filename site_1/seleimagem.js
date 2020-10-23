$(document).ready(function () {
    var readurl = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $(".avatar").attr('src', e.target.result);
            }
        }
    }
    $(".file-upload").on('change', function () {
        readurl(this);

    });
    $(".avatar").click(function () {
        var btn = $(".file-upload");
        btn.trigger("click");
    });
});

