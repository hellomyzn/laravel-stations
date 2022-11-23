<table style="width:100%">
    <tr align="left">
      <th>映画作品</th>
      <th>座席</th>
      <th>日時</th>
      <th>名前</th>
      <th>メールアドレス</th>
    </tr>    
    <tr>
        <td>{{$reservation->schedule->movie->title}}</td>
        <td>{{ strtoupper($reservation->sheet->row . $reservation->sheet->column) }}</td>
        <td>{{$reservation->screening_date}}</td>
        <td>{{$reservation->name }}</td>
        <td>{{$reservation->email}}</td>
        {{-- <td>
          <form action={{route('admin.movies.delete', ['id' => $movie->id])}} method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除" class="btn btn-danger post_del_btn">
          </form>
        </td> --}}
    </tr>
    
    
  </table>

  <a href="{{ route('admin.reservations.edit', ['id' => $reservation->id]) }}">Edit</a>
  <form action={{route('admin.reservations.delete', ['id' => $reservation->id])}} method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="削除" class="btn btn-danger post_del_btn">
  </form>