var { log } = console








function upload_image(options) {
    var avatar = document.getElementById(options.ui_avatar); //input id(options.ui_avatar)
        var image = document.getElementById('ui_image'); // modal image
        var input = $('<input class="d-none" type="file">')
        $(avatar).after(input);
        var input = input[0];

    //   var $alert = $('.alert');
        var $modal = $('#ui_modal');
        var cropper;

        $('[data-toggle="tooltip"]').tooltip();

        input.addEventListener('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
            input.value = '';
            image.src = url;
        //   $alert.hide();
            $modal.modal('show');
        };
        var reader;
        var file;

        if (files && files.length > 0) {
            file = files[0];
            const fileType = file['type'];
            const validImageTypes = ['image/jpeg', 'image/png'];
            if(!validImageTypes.includes(fileType)){
            jQuery('#ui_alert').show()
            jQuery(image).hide()
            }else{
            jQuery('#ui_alert').hide()
            jQuery(image).show()
            }

            if (URL) {
            done(URL.createObjectURL(file));
            } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
            }
        }
        });

        $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 4/1,
            viewMode: 3,
        });
        }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
        });

        document.getElementById('crop').addEventListener('click', function () {
        var initialAvatarURL;
        var canvas;

        $modal.modal('hide');

        if (cropper) {
            canvas = cropper.getCroppedCanvas({
            width: 600,
            height: 200,
            });
            initialAvatarURL = avatar.src;
            avatar.src = canvas.toDataURL();
        //   $alert.removeClass('alert-success alert-warning');
            canvas.toBlob(function (blob) {
            var formData = new FormData();

            var csrf_token = jQuery('meta[name="csrf-token"]').attr('content');
            var group_id = jQuery('input[name="group_id"]').attr('value');

            formData.append('avatar', blob, 'avatar.jpg');
            formData.append('_token', csrf_token);
            formData.append('id', group_id);

            $.ajax('/groups/uploadAvatar', {
                method: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,

            //   xhr: function () {
            //     var xhr = new XMLHttpRequest();

            //     return xhr;
            //   },

                success: function () {
                // $alert.show().addClass('alert-success').text('Upload success');
                },

                error: function () {
                avatar.src = initialAvatarURL;
                // $alert.show().addClass('alert-warning').text('Upload error');
                },

                complete: function () {

                },
            });
            });
        }
        });
}
