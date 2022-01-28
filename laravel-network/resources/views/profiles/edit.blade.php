@extends('layouts.main')

@section('title', 'Profile-page-edit')



@section('content')

@include('/blocks.profile-header')

<div class="container overflow-hidden">
    <form class="edit-form" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="edit-form-wrapp row gy-3">
            <div class="edit-form-input col-sm-6">
                <label for="name" class="form-label">Имя</label>
                <input name="name" type="name" class="form-control" id="name" placeholder="Как вас зовут?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="secondname" class="form-label">Фамилия</label>
                <input name="secondname" type="text" class="form-control" id="secondname" placeholder="Какая у вас фамилия?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="date" class="form-label">Дата рождения </label>
                <input name="date" type="date" class="form-control" id="date" placeholder="Когда вы родились?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="city" class="form-label">Город проживания</label>
                <input name="city" type="text" class="form-control" id="city" placeholder="Где вы живете?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="birth-place" class="form-label">Родной город</label>
                <input name="birth-place" type="text" class="form-control" id="birth-place" placeholder="Где вы родились?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="work" class="form-label">Работа</label>
                <input name="work" type="text" class="form-control" id="work" placeholder="Где вы работаете?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="study" class="form-label">Место учебы</label>
                <input name="study" type="text" class="form-control" id="study" placeholder="Где вы учитесь/учились?">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="family-status" class="form-label">Семейное положение</label>
                <input name="family-status" type="email" class="form-control" id="family-status" placeholder="Ваше семейоне положение">
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="phone" class="form-label">Телефон</label>
                <input name="phone" type="phone" class="form-control" id="phone" placeholder="Ваш контактный телефон">
            </div>
            <div class="edit-form-input col-sm-6">
            <label for="email" class="form-label">Електронная почта</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Ваша электронная почта">
            </div>
            <div class="edit-form-input col-sm-12">
                <label for="yourself" class="form-label">О себе</label>
                <textarea name="yourself" type="text" class="form-control" id="yourself" placeholder="Расскажите о себе"></textarea>
            </div>
            <div class="button-in-form">
                <button type="submit" class="edit-page-btn btn btn-primary">Подтвердить</button>
            </div>

        </div>

        <div class="edit-password row">
            <div class="edit-form-input col-sm-6">
            <label for="pass1" class="form-label">Пароль</label>
            <input name="pass1" type="password" class="form-control" id="pass1">
            <div class="form-text">Ваш старый пароль</div>
            </div>
            <div class="edit-form-input col-sm-6">
                <label for="pass2" class="form-label">Новый Пароль</label>
                <input name="pass2" type="password" class="form-control" id="pass2">
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
