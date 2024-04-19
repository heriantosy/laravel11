<h1>Tambah Data</h1>
<form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
    @csrf 
    @method('PUT')
    <table>
        <tr>
            <td>Judul</td><td><input type="judul" name="judul" value="{{ $agenda->judul }}"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
</form>