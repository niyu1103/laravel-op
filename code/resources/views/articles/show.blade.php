@extends('app')

@section('title', '記事詳細')

@section('content')
    @include('nav')
    <main>
     @if (session('flash_message'))
      <div class="flash_message bg-success text-center py-3 my-0 mb30">
          {{ session('flash_message') }}
      </div>
    @endif
    <div class="container">

      <h1 class='pagetitle'>レビュー詳細ページ</h1>
      <div class="card">

        <div class="card-body">
           @foreach($article->tags as $tag)
          @if($loop->first)
            <div class="card-body pt-0 pb-4 pl-3">
              <div class="card-text line-height">
          @endif
                <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                  {{ $tag->hashtag }}
                </a>
          @if($loop->last)
              </div>
            </div>
          @endif
        @endforeach
          <section class='review-main'>

            <div class='review-image'>
            @if(!empty($article->imgpath))
                    <img class='book-image' src="{{ asset('storage/images/'.$article->imgpath) }}">
            @else
                    <img class='book-image' src="{{ asset('images/dummy.png') }}">
            @endif
          </div>
            <h2 class='h2 mb20'>タイトル：{{ $article->title }}</h2>
            <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
              <div class="font-weight-bold">
                {{ $article->user->name }}
              </div>
            </a>
             <time class="text-secondary">
                {{ $article->created_at->format('Y.m.d H:i') }}
             </time>
            <p>レビュー本文:{{ $article->body }}</p>
          </section>

        </div>
         <p>
           <a href="{{ $article->url }}" target="_blank" rel=”noopener”>URL:{{ $article->url }}</a>
         </p>



        <h2 class="h5 mb-4">
            コメント(コメントはログイン後に投稿することができます。)
        </h2>

        @if (Auth::check())

           <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
            @csrf

          <input type="hidden" name="article_id" value="{{ $article->id }}">
          <div class="form-group">
            <label for="body">本文</label>
          <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">
          {{ old('body') }}
          </textarea>
          @if ($errors->has('body'))
            <div class="invalid-feedback">
              {{ $errors->first('body') }}
            </div>
          @endif
          </div>

          <div class="mt-4">
            <button type="submit" class="btn btn-primary">
               コメントする
            </button>
          </div>

        </form>
        @endif

        <div>


            @forelse($article->comments as $comment)
                <div class="border-top p-4">
                    <time class="text-secondary">
                        {{ $comment->created_at->format('Y.m.d H:i') }}
                    </time>
                    <p> {{ $comment->user->name }}</p>
                    <p class="mt-2">
                        {!! nl2br(e($comment->body)) !!}
                    </p>
                </div>
            @empty
                <p>コメントはまだありません。</p>
            @endforelse
        </div>

        <a href="{{ route('articles.index') }}" class='btn btn-info btn-back mb20'>一覧へ戻る</a>
      </div>
    </div>
  </main>
@endsection
