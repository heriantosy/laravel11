
<div class='card card-info'>
    <div class='card-header with-border'>
        <h3 class='card-title'><b style="color:white;font-size:15px">GANTI LOGO</b></h3>
    </div>
    <form action="{{ route('admin.identitas.simpan', $identitas->Kode) }}" enctype="multipart/form-data" method="post">
        @csrf
        <br>
        <table class='table table-sm table-borderless'>
            <tbody>
                <input type='hidden' name='id' value='{{ $identitas->Kode }}'>
                <tr><th width='220px' scope='row'>Institusi</th><td><input type='text' class='form-control form-control-sm' name='Nama' value='{{ $identitas->Nama }}'></td></tr>
                <tr><th width='220px' scope='row'>Alamat</th><td><input type='text' class='form-control form-control-sm' name='Alamat1' value='{{ $identitas->Alamat1 }}'></td></tr>
                <tr><th width='220px' scope='row'>Telepon</th><td><input type='text' class='form-control form-control-sm' name='Telepon' value='{{ $identitas->Telepon }}'></td></tr>
                <tr><th width='220px' scope='row'>Logo</th><td><input type='file' name='Logo' id='Logo' class='form-control form-control-sm' placeholder='Upload Logo'></td></tr>
                <tr><th width='220px' scope='row'></th><td><img class="img img-thumbnail img-responsive" style="width:20%" src="{{ $identitas->Logo ? asset('storage/identitas/'.$identitas->Logo) : asset('assets/images/avatar.png') }}"></td></tr>
            </tbody>
        </table>
        <div class='card-footer'>
            <button type='submit' name='submit' class='btn btn-info btn-sm'>Simpan</button>
        </div>
    </form>
</div>
