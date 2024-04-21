@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p>
  @include('admin/prodi/tambah')
</p>

<form action="{{ route('prodi.create') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">
  <div class="col-md-12">
    <div class="btn-group">
      <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
          <i class="fa fa-trash"></i>
      </button> 
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
       
        <a href="{{ route('cetak-prodi') }}" class="btn btn-primary btn-sm" target="_BLANK"><i class="fa fa-print"></i></a>
       
   </div>
</div>
</div>

<div class="clearfix"><hr></div>
<div class="table-responsive mailbox-messages">
    <div class="table-responsive mailbox-messages">
<table id="example1" class="display table-sm table-bordered" cellspacing="0" width="100%">
<thead>
    <tr class="bg-info">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
    <th><b style='color:white;font-weight:reguler'>ProdiID</b></th>
    <th><b style='color:white;font-weight:reguler'>Nama Prodi</b></th>
    <th><b style='color:white;font-weight:reguler'>Aksi</b></th>
</tr>
</thead>
<tbody>
@foreach ($prodi as $row)
<td class="text-center">
    <div class="icheck-primary">
        <input type="checkbox" class="icheckbox_flat-blue" name="ProdiID[]" value="{{ $row->ProdiID }}" id="check{{ $loop->iteration }}">
        <label for="check{{ $loop->iteration }}"></label>
    </div>
</td>

<td>{{ $row->ProdiID }}</td>
<td>{{ $row->Nama }}</td>
<td>
    <div class="btn-group">
        <a href="{{ route('prodi.edit', $row->ProdiID) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

        <!-- <a href="{{ asset('admin/prodi/delete/'.$row->ProdiID) }}" class="btn btn-danger btn-sm  delete-link">
            <i class="fa fa-trash"></i>
        </a> -->

        <form action="{{ route('prodi.destroy', $row->ProdiID) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm">Del</button>
        </form>
    </div>
</td>

</tr>

@endforeach

</tbody>
</table>
</div>
</div>
</form>