@extends('layouts.main')

@section('title', 'Create group')

@section('content')

@include('/blocks.profile-header')

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>

<div class="container groups-create-wrapper">

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        @foreach ($errors->all() as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
    </div>
    @endif

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('groups.store') }}" method="POST">

        @csrf

        <div class="mb-3">
          <label for="label1" class="form-label">Group name</label>
          <input name="name" value="{{ old('name') }}" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="label1">
          {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="mb-3">
          <label for="label2" class="form-label">Description</label>
          <input name="description" value="{{ old('description') }}" type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="label2">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Group image</label>
            <input name="avatar" class="form-control" type="file" id="formFile">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>



  @endsection
