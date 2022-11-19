<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Practice</title>
</head>
<body>
<ul>

<table style="width:100%">
    <tr>
      <th>映画タイトル</th>
      <th>画像URL</th>
      <th>公開年</th>
      <th>上映中かどうか</th>
      <th>概要</th>
      <th>機能</th>
    </tr>
    
    <tr>
        <td>{{$movie->title}}</td>
        <td>{{$movie->image_url}}</td>
        <td>{{$movie->published_year}}</td>
        <td>{{$movie->is_showing == 0 ? '上映予定' : '上映中'}}</td>
        <td>{{$movie->description}}</td>
        <td>
          <form action={{route('admin.movies.delete', ['id' => $movie->id])}} method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除" class="btn btn-danger post_del_btn">
          </form>
        </td>
    </tr>
    
  </table>

  <table style="width:100%">
    <tr>
      <th>開始時刻</th>
      <th>終了時刻</th>
      <th>機能</th>
    </tr>
    {{-- {{ dd($movie->schedules) }} --}}
    @foreach ($schedules as $schedule)
    <tr>
        <td>{{$schedule->start_time}}</td>
        <td>{{$schedule->end_time}}</td>
        <td>
        <form action={{route('admin.movies.delete', ['id' => $movie->id])}} method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除" class="btn btn-danger post_del_btn">
        </form>
        </td>            
    </tr>
    @endforeach
    
  </table>

</ul>
</body>
</html>