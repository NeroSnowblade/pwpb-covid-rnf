Database Viewer :v
<table>
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Golongan Darah</td>
    </tr>
    @foreach ($siswa as $row)
    <tr>
        <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
        <td>{{ $row->nama_lengkap }}</td>
        <td>{{ $row->jenis_kelamin }}</td>
        <td>{{ $row->golongan_darah }}</td>
    </tr>    
    @endforeach
</table>