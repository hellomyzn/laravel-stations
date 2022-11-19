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
            
            <td>{{ $sheets[($i * 5) + $j]->row ."-". $sheets[($i * 5) + $j]->column  }}</td>
            
        @endfor
        </tr>
    @endfor
    <tr>
        
    </tr>
  </table>