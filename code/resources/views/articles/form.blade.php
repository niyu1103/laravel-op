@csrf
<div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
</div>
<div class="md-form">
  <label>画像</label>
  <input type="file" name="imgpath" class="" >
</div>
<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
</div>
<div class="form-group">
 <article-tags-input
   :initial-tags='@json($tagNames ?? [])'
   :autocomplete-items='@json($allTagNames ?? [])'
   >
  </article-tags-input>
</div>
<div class="md-form">
  <label>url</label>
  <input type="text" name="url" class="form-control" value="{{ $article->url ?? old('url') }}">
</div>
