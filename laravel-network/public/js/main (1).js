var { log } = console


jQuery(function($){

$('[data-upload]').each(function(){
	upload_image({
		ajax_url: this.dataset.ajaxurl,
		avatar: this,
		width: this.dataset.width,
		height: this.dataset.height,
        model_id: this.dataset.modelid,
	})
})

function upload_image(options) {
	var avatar = options.avatar; // input id (options.ui_avatar)
	var image = document.getElementById('ui_image'); // modal image
	var input = $('<input class="d-none" type="file">')
	$(avatar).after(input)
	var input = input[0]
	var $modal = $('#ui_modal');
	var cropper;

	input.addEventListener('change', function (e) {
		var files = e.target.files;
		if (files && files.length > 0) {
				var file = files[0];
				const fileType = file['type'];
				const validImageTypes = ['image/jpeg', 'image/png'];
				if (!validImageTypes.includes(fileType)) {
						jQuery('#ui_alert').show()
						jQuery(image).hide()
				}else{
						jQuery('#ui_alert').hide()
						jQuery(image).show()
				}

			if (FileReader) {
				var reader = new FileReader();
				reader.onload = function (e) {
					input.value = '';
					image.src = reader.result;
					$modal.modal('show');
					setTimeout(() => { // (?)
						cropper = new Cropper(image, {
							aspectRatio: options.width / options.height,
							viewMode: 3,
						});
					}, 200)
				};
				reader.readAsDataURL(file);
			}
		}
	});

	$modal.on('shown.bs.modal', function () {

	}).on('hidden.bs.modal', function () {
		if(cropper) {
			cropper.destroy();
			cropper = null;
		}
	});

	document.getElementById('crop').addEventListener('click', function () {
		var initialAvatarURL;
		var canvas;

		$modal.modal('hide');

		if (cropper) {
			canvas = cropper.getCroppedCanvas({
				width: options.width,
				height: options.height,
			});
			initialAvatarURL = avatar.src;
			avatar.src = canvas.toDataURL();
			canvas.toBlob(function (blob) {
				var formData = new FormData();

				var csrf_token = jQuery('meta[name="csrf-token"]').attr('content')

				formData.append('avatar', blob, 'avatar.jpg');
				formData.append('_token', csrf_token)
				formData.append('id', options.model_id)

				$.ajax(options.ajax_url, {
					method: 'POST',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					success: function () {},
					error: function () {
						avatar.src = initialAvatarURL;
					},
					complete: function () {},
				});
			});
		}
	});
}





}) // jQuery ready
