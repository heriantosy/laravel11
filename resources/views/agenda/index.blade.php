<h1>Master Agenda</h1>
<a href="{{ route('agenda.create') }}">Tambah Data</a>
<table width="50%" border="1">
    <tr>
        <td>No</td>
        <td>Judul</td>
        <td>Aksi</td>
        <td></td>
    </tr>

    @foreach($agenda as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->judul }} </td>
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