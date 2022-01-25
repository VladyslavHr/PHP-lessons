@extends('layouts.main')

@section('title', 'Groups page')

@section('content')

@include('/blocks.profile-header')

<div class="container mt-5 bg-white">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-lg-12 col-xl-9 col-xxl-9">
            <div class="top-navi">
                <div class="friends-count">Группы (кол-во)</div>
                    <ul class="navi-list">
                        <li><a href="#">Все</a></li>
                        <li><a href="#">Мои группы</a></li>
                        <li><a href="#">Мои подписки</a></li>
                        <li><a href="{{ route('groups.create') }}">Создать группу</a></li>
                        <li><a href="#">Может быть интересным</a></li>
                        <li><button type="submit"><i class="bi bi-list"></i></button></li>
                    </ul>
            </div>
        </div>
    </div>
</div>
{{--
col-xl-3 col-lg-4 col-md-6 col-sm-12 --}}

<div class="groups-main-wrap container">
    <div class="groups-main row">
        <div class="col-md-5">
            <div class="groups-block">
                <div class="groups-image">
                    <div>
                        <label class="upload-image-label">
                            <img id="ui_avatar" src="{{ $group->avatar }}" alt="">
                            <input class="d-none" id="ui_input" type="file">
                            <input type="hidden" name="group_id" value="{{ $group->id }}">
                        </label>
                    </div>
                </div>
                <div class="groups-name-desc-subsc">
                    <div>
                        <div class="group-name">{{$group->name}}</div>
                        <div class="group-description">{{$group->description}}</div>
                        <div class="group-subscribe">
                        <button type="submit">Subcribe</button>
                        </div>
                        <div class="group-description">{{$group->creator->name}}
                            @if ($group->creator->id === $group->creator->id)
                                <a href="{{ route('groups.edit', $group) }}"><i class="bi bi-pencil-square"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="groups-block">
                <ul class="group-list-link">
                    <li><a href="#" class="group-info-link">Подписчики</a></li>
                    <li><a href="#" class="group-info-link">Фото</a></li>
                    <li><a href="#" class="group-info-link">Мероприятия</a></li>
                    <li><a href="#" class="group-info-link">Темы</a></li>
                    <li><a href="#" class="group-info-link">Файлы</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
            <div class="group-publish">
                @include('blocks.add-post-form')
            </div>
            <div class="publishing">
                @foreach ($group->posts as $post)
                <div class="post-block">
                    <div class="post-title">
                        <div class="user-image">
                            <img src="{{ asset ('images/cat.jpg') }}" alt="">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $post->author->name }}</span>
                            <span class="post-time">{{ $post->date_formated() }}</span>
                        </div>
                        <div class="post-set-bar">
                            <a href="#"><i class="bi bi-list"></i></a>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>
                            {{$post->content}}
                        </p>
                        <img src="{{ asset ('images/banner1.jpg') }}" alt="">
                    </div>
                    <div class="post-summery">
                        <div class="post-like">
                            <a href="#">
                                <i class="bi bi-suit-heart"></i>
                                <span class="like-count">Вам и еще 110 людям это понравилось</span>
                            </a>
                        </div>
                        <div class="post-comments">
                            <a href="#">
                                <i class="bi bi-chat-dots"></i>
                                <span  class="count">{{$post->comment_count}}</span>
                            </a>
                        </div>
                        <div class="post-share">
                            <a href="#">
                                <i class="bi bi-share"></i>
                                <span class="count">6</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


{{-- Upload image modal --}}
<div class="modal fade" id="ui_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Crop the image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <img style="max-width: 100%" id="ui_image" src="https://avatars0.githubusercontent.com/u/3456749">
            <div class="alert alert-danger hide" role="alert" id="ui_alert">
                Please choose jpeg or png file!
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="crop">Crop</button>
        </div>
      </div>
    </div>
  </div>
{{-- Upload image modal --}}

<script>
    window.addEventListener('DOMContentLoaded', function () {
      var avatar = document.getElementById('ui_avatar');
      var image = document.getElementById('ui_image');
      var input = document.getElementById('ui_input');
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
        var url;

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
    });
  </script>


@endsection
