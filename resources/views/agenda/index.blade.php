<h1>Master Agenda</h1>
<a href="{{ route('agenda.create') }}">Tambah Data</a>
<table width="50%" border="1">
    <tr style="background: purple;color:white">
        <td>No</td>
        <td>Judul</td>
        <td>Tgl Mulai</td>
         <td>Tgl Selesai</td>
        <td>Aksi</td>
        <td></td>
    </tr>

    @foreach($agenda as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->judul }} </td>
        <td>{{ $item->tgl_mulai }}</td>
        <td>{{ $item->tgl_selesai }}</td>
        <td>
            <a href="{{ route('agenda.edit', $item->id) }}">Edit</a>
        </td>
        <td>
        <form action="{{ route('agenda.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
</table>
