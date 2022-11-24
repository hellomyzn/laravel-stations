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
  
  <br>
  
  <br>
  <br>
  <br>
  <table style="width:100%">
    <tr align="left">
      <th>開始時刻</th>
      <th>終了時刻</th>
      <th>スクリーン</th>
    </tr>
    {{-- {{ dd($movie->schedules) }} --}}
    
    <tr>
        <td>{{$schedule->start_time}}</td>
        <td>{{$schedule->end_time}}</td>
        <td>
          @foreach ($schedule->screens as $screen)
              <p>{{$screen->name}} Screen</p>
          @endforeach            
    </tr>
  </table>


  <form action={{ route('admin.schedules.screen_schedule.store', ['id' => $schedule->id]) }} method="post">
    @csrf
    <div class="form-group">
        <label for="screen">スクリーン:</label><br>
          <select name="screen_id">
            @foreach ($diff_screens as $screen)
              <option value={{ $screen->id }}>{{ $screen->name }}</option>                    
            @endforeach
          </select>
          <br><br>

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
            <input class="btn btn-primary" type="submit" value="追加する">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="movie_id" value={{$movie->id}}>
        </div>
    </div>
</form>

</ul>
</body>
</html>