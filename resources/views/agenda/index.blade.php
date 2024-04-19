<h1>Master Agenda</h1>
<a href="{{ route('agenda.create') }}">Tambah Data</a>
<table>
    <tr>
        <td>No</td>
        <td>Judul</td>
    </tr>

    @foreach($agenda as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->judul }} </td>
    </tr>
    @endforeach
</table>