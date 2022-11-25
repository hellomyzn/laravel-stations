<form action={{ route('reservations.store') }} method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <p>映画作品: {{ $movie->title }}</p>

        <p>上映スケジュール: {{ $schedule->start_time->format("H:i") }} - {{ $schedule->end_time->format("H:i") }}</p>

        <p>座席: {{ $sheet->row ."-". $sheet->column  }}</p>

        <p>日付: {{ $screening_date }}</p>

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
            <input class="btn btn-primary" type="submit" value="予約する">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
            <input type="hidden" name="screening_date" value="{{ $screening_date }}">
            <input type="hidden" name="sheet_id" value="{{ $sheet->id }}">
            
        </div>
    </div>
</form>