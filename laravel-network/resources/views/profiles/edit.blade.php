@extends('layouts.main')

@section('title', 'Profile-page-edit')

@section('dynamic-menu')
    @include('blocks.profile-menu')
@endsection

@section('content')

@include('/blocks.profile-header')

<div class="container mt-5 pt-2">

    <form action="{{ route('profile.delete', $user) }}"
        class="delete-profile-form" method="POST"
        onsubmit="if(!confirm('Are you sure?')) return false">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Delete profile</button>
    </form>

    <form class="edit-form mb-5" action="{{ route('profiles.update') }}" method="POST" enctype='multipart/form-data'>

        @csrf
        <div class="edit-form-wrapp row gy-3">
            <div class="edit-form-input col-sm-6">
                <label for="name" class="form-label">Имя</label>
                <input value="{{ $user->name }}" name="name" type="name" class="form-control" id="name" placeholder="Как вас зовут?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="last_name" class="form-label">Фамилия</label>
                <input value="{{ $user->last_name }}" name="last_name" type="text" class="form-control" id="last_name" placeholder="Какая у вас фамилия?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="birth_date" class="form-label">Дата рождения </label>
                <input value="{{ $user->birth_date ? $user->birth_date->format('Y-m-d') : '' }}" name="birth_date" type="date" class="form-control" id="birth_date" placeholder="Когда вы родились?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="work" class="form-label">Работа</label>
                <input value="{{ $user->work }}" name="work" type="text" class="form-control" id="work" placeholder="Где вы работаете?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="city" class="form-label">Город проживания</label>
                <input value="{{ $user->city }}" name="city" type="text" class="form-control" id="city" placeholder="Где вы живете?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="birth_city" class="form-label">Родной город</label>
                <input value="{{ $user->birth_city }}" name="birth_city" type="text" class="form-control" id="birth_city" placeholder="Где вы родились?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="study" class="form-label">Место учебы</label>
                <input value="{{ $user->study }}" name="study" type="text" class="form-control" id="study" placeholder="Где вы учитесь/учились?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="family_status" class="form-label">Семейное положение</label>
                {{-- <input value="{{ $user->family_status }}" name="family_status" type="text" class="form-control" id="family_status" placeholder="Ваше семейоне положение"> --}}
                <select name="family_status" class="form-select">
                    <option value="single" {{ $user->family_status === 'single' ? 'selected' : '' }}>single</option>
                    <option value="married" {{ $user->family_status === 'married' ? 'selected' : '' }}>married</option>
                    <option value="in_search" {{ $user->family_status === 'in_search' ? 'selected' : '' }}>in search</option>
                </select>
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="phone" class="form-label">Телефон</label>
                <input value="{{ $user->phone }}" name="phone" type="phone" class="form-control" id="phone" placeholder="Ваш контактный телефон">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="email" class="form-label">Електронная почта</label>
                <input value="{{ $user->email }}" name="email" type="email" class="form-control" id="email" placeholder="Ваша электронная почта">
            </div>
            {{-- <div class="edit-form-input col-sm-12">
                <label for="cover_photo" class="form-label">Фото обложки</label>
                <input type="file" name="cover_photo" class="form-control" id="cover_photo">
            </div> --}}
            <div class="edit-form-input col-sm-12">
                <label for="about_yourself" class="form-label">О себе</label>
                <textarea name="about_yourself" type="text" class="form-control" id="about_yourself" placeholder="Расскажите о себе">{{ $user->about_yourself }}</textarea>
            </div>
            <div class="button-in-form">
                <button type="submit" class="edit-page-btn btn btn-primary">Подтвердить</button>
            </div>

        </div>

    </form>
    {{-- {{ route('profiles.update.password') }} --}}
    <form class="edit-form mb-5" action="{{ route('prodile.changeCoverPhoto') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="edit-password row">
            <div class="edit-form-input col-sm-12">
                <label for="cover_photo" class="form-label">Фото обложки</label>
                <input type="file" name="cover_photo" class="form-control" id="cover_photo">
            </div>
            <div class="button-in-form mt-3">
                <button type="submit" class="edit-page-btn btn btn-primary">Подтвердить</button>
            </div>
        </div>

    </form>

    <form class="edit-form mb-5" action="{{ route('profiles.updatePassword') }}" method="POST">
        @csrf
        <div class="edit-password row">
            <div class="edit-form-input col-sm-6">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="pass1">
            <div class="form-text">Ваш старый пароль</div>
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="pass2" class="form-label">Новый Пароль</label>
                <input name="password_confirmation" type="password" class="form-control" id="pass2">
                <div class="form-text">Ваш новый пароль</div>
            </div>
            <div class="button-in-form">
                <button type="submit" class="edit-page-btn btn btn-primary">Подтвердить</button>
            </div>
        </div>
        {{-- <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Подтвердить</label>
        </div> --}}

    </form>

</div>





@endsection
