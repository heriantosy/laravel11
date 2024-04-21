<h1>Master Agenda</h1>
<a class="btn btn-success btn-sm" href="{{ route('agenda.create') }}">Tambah Data</a><p></p>
<div class="table-responsive mailbox-messages">
<table id="example1" class="table table-striped table-sm" width="100%">
<thead>
    <tr class="bg-dark" style='color:white;height:5px;'>
    <tr style="background: purple;color:white">
        <td>No</td>
        <td>Judul</td>
        <td>Tgl Mulai</td>
         <td>Tgl Selesai</td>
        <td>Aksi</td>
        <td></td>
    </tr>
    </thead>
<tbody>
    @foreach($agenda as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->MhswID }} </td>
        <td>{{ $item->Nama }}</td>
        <td>{{ $item->ProdiID }}</td>
        <td>
            <a href="{{ route('agenda.edit', $item->MhswID) }}"><i class="fa fa-edit" style="color:red"></i></a>
        </td>
        <td>
        <form action="{{ route('agenda.destroy', $item->MhswID) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"><i class="fa fa-trash" style="color:red"></i></button>
        </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
