<form action={{ route('admin.reservations.store') }} method="post">
    @csrf
    <div class="form-group">
        <label for="movie_id">映画作品 ID:</label><br>
        <input type="number" id="movie_id" name="movie_id" min="0" max="{{ count($movies)}}"><br>

        <label for="screening_date">日程</label><br>
        <input type="date" id="screening_date" name="screening_date"><br>

        <label for="schedule_id">上映スケジュール ID:</label><br>
        <input type="number" id="schedule_id" name="schedule_id"min="0" max="{{ count($schedules)}}"><br>

        <label for="sheet_id">座席 ID:</label><br>
        <input type="number" id="sheet_id" name="sheet_id" min="0" max="{{ count($sheets)}}"><br>
        
        <label for="name">予約者氏名:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="name">メールアドレス:</label><br>
        <input type="email" id="email" name="email"><br>

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
            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
            <input type="hidden" name="screening_date" value="{{ $screening_date }}">
            <input type="hidden" name="sheet_id" value="{{ $sheet->id }}"> --}}
            
        </div>
    </div>
</form>