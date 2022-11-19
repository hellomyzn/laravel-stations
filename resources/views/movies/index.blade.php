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
    @csrf
    <div class="form-group">
        <input type="text" placeholder="検索" name="keyword" value={{ $keyword }}>
        <div class="text-center mt-3">
            <button type="submit">検索</button>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
    </div>
</form>
<ul>
@foreach ($movies as $movie)
<li>タイトル: {{ $movie->title }}</li>
<li>画像: {{ $movie->image_url }}</li>
@endforeach
</ul>
</body>
</html>