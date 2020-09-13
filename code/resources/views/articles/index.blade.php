@extends('app')

@section('title', '記事一覧')

@section('content')
   @include('nav')
   <main>
    @if (session('flash_message'))
      <div class="flash_message bg-success text-center py-3 my-0 mb30">
          {{ session('flash_message') }}
      </div>
    @endif
    <div class="container">

      @foreach($articles as $article)
        @include('articles.card')
      @endforeach

    </div>
    {{ $articles->links() }}
  </main>
@endsection
