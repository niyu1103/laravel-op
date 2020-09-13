@extends('app')

@section('title', $user->name)

@section('content')
  @include('nav')
  @if (session('flash_message'))
      <div class="flash_message bg-success text-center py-3 my-0 mb30">
          {{ session('flash_message') }}
      </div>
  @endif
  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex flex-row">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
          @if ($user->profile_photo)
            <img class="round-img" src="{{ asset('storage/images/'.$user->profile_photo) }}"/>
          @else
            <img class="round-img" src="{{ asset('/images/icon_person.png') }}"/>
          @endif
        </a>
        </div>
        <h2 class="h5 card-title m-0">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            {{ $user->name }}
          </a>
        </h2>
      </div>
      <div class="card-body">
        <h2>自己紹介</h2>
        <p>{{ $user->body }}</p>
        <p>URL:<a href="{{ $user->url }}" target="_blank">{{ $user->url }}</a></p>
        <a href="{{ route('users.edit', ['user' => $user]) }}">
          <i class="fas fa-edit"></i>
           プロフィールを編集する
        </a>
      </div>
    </div>
  </div>
@endsection
