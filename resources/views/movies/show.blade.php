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
      <tr align="left">
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
    <tr align="left">
      <th>開始時刻</th>
      <th>終了時刻</th>
      <th>機能</th>
    </tr>
    
    @foreach ($schedules as $schedule)
    
    <tr>
      <p>{{explode(" ",$schedule->start_time)[0]}}</p>

      <td>{{ $schedule->start_time->format('h:i') }}</td>
      <td>{{ $schedule->end_time->format('h:i') }}</td>
      <td>
        <form action={{route('movies.show.sheets', ['id' => $movie->id, 'schedule_id' => $schedule->id])}} method="GET">
          @csrf
          <input type="submit" value="座席を予約する" class="btn btn-danger post_del_btn"> 座席を予約する
          <input type="hidden" name="screening_date" value={{$schedule->start_time}}>
        </form>
      </td>            
    </tr>
    
    @endforeach
    
  </table>
  @if (session('successMessage'))
  <div class="alert alert-success text-center">
    {{ session('successMessage') }}
  </div> 
  @endif

</ul>
</body>
</html>