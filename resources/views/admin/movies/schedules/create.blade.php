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
    <form action={{ route('admin.movies.schedule.store', ['id' => $movie->id]) }} method="post">
        @csrf
        <div class="form-group">
            <label for="start_time_date">開始日:</label><br>
            <input type="date" id="start_time_date" name="start_time_date"><br>

            <label for="start_time_time">開始時間:</label><br>
            <input type="time" id="start_time_time" name="start_time_time"><br>

            <label for="end_time_date">終了日:</label><br>
            <input type="date" id="end_time_date" name="end_time_date"><br>

            <label for="end_time_time">終了時間:</label><br>
            <input type="time" id="end_time_time" name="end_time_time"><br>

            @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="text-center mt-3">
                <input class="btn btn-primary" type="submit" value="投稿する">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="movie_id" value={{$movie->id}}>
            </div>
        </div>
    </form>


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