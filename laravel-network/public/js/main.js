var { log } = console


// jQuery(function($){


function ln_init() {
    $('[data-upload]').each(function(){
        upload_image({
            ajax_url: this.dataset.ajaxurl,
            avatar: this,
            width: this.dataset.width,
            height: this.dataset.height,
            model_id: this.dataset.modelid,
        })
    })
}

ln_init()


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
					success: function (response) {
                        if (response.status && response.status === 'ok') {
                            $(`img[src$="${initialAvatarURL.replace(location.origin, '')}"]`).attr('src', response.data.avatar)
                            alert('success', 'Аватар обновлен')
                        }else{
                            alert('danger', 'Error')
                        }

					},
					error: function () {
                        alert('danger', 'Server error')
                    },
					complete: function () {},
				});
			});
		}
	});
}



$(".alert-success").delay(4000).slideUp(400, function () {
    $(this).alert('close');
})

$( document ).ajaxStart(function() {
    if (document.body.classList.contains('ajax_loader')) {
        $('#ajax_loader').addClass('active')
    }
});

$( document ).ajaxStop(function() {
    $('#ajax_loader').removeClass('active')
});




$('#post_list').on('keyup', '.js-comment-input', function(){
    if(this.value) {
        if(!this.btn) this.btn =  $(this).closest('.post-block').find('.add-comments-send')
        this.btn.addClass('active').attr('disabled', false)
    }else{
        if(this.btn){
            this.btn.removeClass('active').attr('disabled', true)
        }
        this.btn = false
    }

})


$('body').on('click', '.js-no-reload a', function(e) {
    e.preventDefault();
    var url = this.href
    $.get(url, function(data) {
        var htmlDoc = document.implementation.createHTMLDocument('data');
        htmlDoc.open();
        htmlDoc.write(data)
        htmlDoc.close();

        var yield_content_current = document.getElementById('yield_content')
        var yield_content_loaded_html = htmlDoc.getElementById('yield_content').innerHTML
        yield_content_current.innerHTML = yield_content_loaded_html

        document.title = htmlDoc.title;

     	window.history.pushState({},"", url);

        ln_init()

        document.querySelectorAll('.MagicZoom_').forEach(function(link)
        {
            MagicZoom.refresh(link)
        })

     	// window.scrollTo(0, 0)
    })
})

function scrollToTop () {
  const c = document.documentElement.scrollTop || document.body.scrollTop
  if (c > 0) {
    window.requestAnimationFrame(scrollToTop)
    window.scrollTo(0, c - c / 8)
  }
}



// })
// jQuery ready

function add_post(form, event) {
    event.preventDefault()

    var formData = new FormData(form)

    $.ajax(form.action, {
        method: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data && data.status === 'ok') {
                alert('success', data.message || 'Success!')
                form.reset()
                // $('#post_list').prepend(data.post_block)
                log(formData.get('postable_id'))
                reload_posts({
                    postable_id: formData.get('postable_id'),
                    postable_type: formData.get('postable_type'),
                    page: 1,
                })
            }else{
                if (data.errors && data.errors.length) {
                    data.errors.forEach(err => alert('danger', err))
                }else{
                    alert('danger', data.message || ' Error!')
                }

            }
        },
        error: function (xhr) {
            if (xhr.responseJSON && xhr.responseJSON.message){
                alert('danger', xhr.responseJSON.message)
            }else{
                alert('danger', 'Server error')
            }

        },
        complete: function () {},
    });

}


function add_comment(form, event) {
    event.preventDefault()
    $.post(form.action, $(form).serialize(), function (data) {
        if(data && data.status === 'ok') {
            alert('success', data.message || 'Success!')

            var post_id = $(form).find('input[name="post_id"]').val()
            $('#post_'+post_id+' .js-comments-list').append(data.comment_block)
            $('#post_'+post_id+' .comments-count').html(data.comments_count)
            $('#collapse_'+post_id).addClass('show')
            $(form).find('.add-comments-send').removeClass('active').attr('disabled', true)
            form.reset()
        }else{
            alert('danger', data.message || ' Error!')
        }
    })
}


function delete_post(button){
    var post_id = button.dataset.postid

    var csrf_token = jQuery('meta[name="csrf-token"]').attr('content')
    $.ajax('/posts/' +post_id,
    {
        type : 'DELETE',
        data : {
            _token: csrf_token
        },
        success: function(data) {
            log(data)
            if(data && data.status === 'ok') {
                $(button).closest('.post-block').remove()
            }

        }
    }

    )
}

function follow(link, event) {
    event.preventDefault()
    // var csrf_token = jQuery('meta[name="csrf-token"]').attr('content')
    $.post(link.href, {
        _token: jQuery('meta[name="csrf-token"]').attr('content'),
        friend_user_id: link.dataset.frienduserid,
    }, function (data) {
        if(data && data.status === 'ok') {
            alert('success', data.message || 'Success!')
            link.href = data.new_href
            link.innerHTML = data.new_text
            // reload_posts(link.dataset.frienduserid)
            reload_posts({
                postable_id: link.dataset.frienduserid,
                postable_type: 'App\\Models\\User',
                page: 1,
            })
        }else{
            alert('danger', data.message || ' Error!')
        }
    })
}

function reload_posts(options) {
    $.post('/posts/reloadPosts', {
        _token: jQuery('meta[name="csrf-token"]').attr('content'),
        postable_id: options.postable_id,
        postable_type: options.postable_type,
        page: options.page,
    }, function(data) {
        if(data && data.status === 'ok'){
            $('#post_list_paginated').html(data.posts_html)
        }

    })

}


function alert(status, text) {
    var alert = `<div class="alert alert-${status} alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    ${text}
    </div>`
    $('#errors_list').prepend(alert)
    $(".alert-success").delay(4000).slideUp(400, function () {
        $(this).alert('close');
    })
}





// $('#summernote').summernote({
//     height: 300,                 // set editor height
//     minHeight: null,             // set minimum height of editor
//     maxHeight: null,             // set maximum height of editor
//     focus: true                  // set focus to editable area after initializing summernote
//     });
