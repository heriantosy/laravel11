@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('prodi.update', [$prodi->ProdiID]) }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('put')

    <div class="form-group row">
        <label for="ProdiID" class="col-sm-3 control-label text-right">ProdiID</label>
        <div class="col-sm-9">
            <input type="text" name="ProdiID" id="ProdiID" class="form-control" placeholder="Prodi ID" value="{{ $prodi->ProdiID }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="Nama" class="col-sm-3 control-label text-right">Nama Program Studi</label>
        <div class="col-sm-9">
            <input type="text" name="Nama" id="Nama" class="form-control" placeholder="Nama Program Studi" value="{{ $prodi->Nama }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="Pejabat" class="col-sm-3 control-label text-right">Pejabat</label>
        <div class="col-sm-9">
            <input type="text" name="Pejabat" id="Pejabat" class="form-control" placeholder="Nama Pejabat" value="{{ $prodi->Pejabat }}" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-9 offset-sm-3">
            <div class="btn-group pull-right">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan Data">
                <input type="reset" name="reset" class="btn btn-success" value="Reset">
                <a href="{{ asset('admin/prodi/index') }}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
</form>
