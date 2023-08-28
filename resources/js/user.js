$(function () {
    $(".updateAndUploadProfileImage").on('change', function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
            var image = reader.result;
            $(".uploadProfileImagePreview").attr('src', image);
        };        
    });

    $(".userNewPassword").on("keyup",  function () {
        const newPass = $(this).val();

        if (newPass.length > 0) {
            $(".userNewPasswordLabel").removeClass("optional").addClass("required");
            $(".userNewPassword").attr("required", true);
        } else {
            $(".userNewPasswordLabel").removeClass("required").addClass("optional");
            $(".userNewPassword").removeAttr("required", false);
        }

    });
});