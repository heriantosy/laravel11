<h1>Tambah Data</h1>
<form action="{{ route('agenda.store') }}" method="POST">
    @csrf 
    <table>
        <tr>
            <td>Judul</td><td><input type="judul" name="judul"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
</form>