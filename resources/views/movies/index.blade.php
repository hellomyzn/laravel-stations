<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Practice</title>
</head>
<body>
<form action={{ route('movies.index') }} method="get">
    {{-- @csrf --}}
    <div class="form-group">
        <input type="text" placeholder="検索" name="keyword" value={{ $keyword }}> <br>

        <input type="radio" id="all" name="is_showing" value="">
        <label for="all">すべて</label><br>
        <input type="radio" id="pre_release" name="is_showing" value=0>
        <label for="pre_release">公開予定</label><br>
        <input type="radio" id="released" name="is_showing" value=1>
        <label for="released">公開中</label> <br>

        <button type="submit">検索</button>
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
    </div>
</form>

@foreach ($movies as $movie)
<li>タイトル: <a href={{ route('movies.show',['id' => $movie->id])}}>{{ $movie->title }}</a></li>
    
<li>画像: {{ $movie->image_url }}</li>
@endforeach
</ul>
</body>
</html>