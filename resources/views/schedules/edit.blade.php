<form action={{ route('admin.schedules.update', ['id' => $schedule->id]) }} method="post">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="start_time_date">開始日:</label><br>
        <input type="date" id="start_time_date" name="start_time_date" value={{ $start_time_date}}><br>

        <label for="start_time_time">開始時間:</label><br>
        <input type="time" id="start_time_time" name="start_time_time" value={{ $start_time_time }}><br>

        <label for="end_time_date">終了日:</label><br>
        <input type="date" id="end_time_date" name="end_time_date" value={{ $end_time_date}}><br>

        <label for="end_time_time">終了時間:</label><br>
        <input type="time" id="end_time_time" name="end_time_time" value={{ $end_time_time}}><br>

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
