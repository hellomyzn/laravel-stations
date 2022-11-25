<p>{{$screening_date}}</p>
<table>
    <tr>
      <th>.</th>
      <th>.</th>
      <th>スクリーン</th>
      <th>.</th>
      <th>.</th>
    </tr>
    <tr>
        <td>:-:</td>
        <td>:-:</td>
        <td>:-:</td>
        <td>:-:</td>
        <td>:-:</td>
    </tr>
    @for ($i = 0; $i < 3; $i++)
        <tr>
        @for ($j = 0; $j < 5; $j++)

            <td>
                
                <form action={{route('movies.reservations.create', ['id' => $id, 'schedule_id' => $schedule_id])}} method="GET">
                    @csrf
                    
                    @if (count($sheets[($i * 5) + $j]->reservations) < count($screen_schedules))
                        <input type="submit" value="{{ $sheets[($i * 5) + $j]->row ."-". $sheets[($i * 5) + $j]->column  }}" class="btn btn-danger post_del_btn">
                    @else        
                        <input type="button" disabled value="{{ $sheets[($i * 5) + $j]->row ."-". $sheets[($i * 5) + $j]->column  }}" class="btn btn-danger post_del_btn">
                    @endif
                    <input type="hidden" name="screening_date" value={{$screening_date}}>
                    <input type="hidden" name="sheetId" value={{$sheets[($i * 5) + $j]->id}}>
                </form>
            </td>
            
        @endfor
        </tr>
    @endfor
    <tr>
        
    </tr>
  </table>