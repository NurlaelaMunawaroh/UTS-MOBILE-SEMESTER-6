<h1>Tambah Matkul</h1>

<form action="/matkul" method="POST">
@csrf
Kode: <input type="text" name="kode_matkul"><br>
Nama: <input type="text" name="nama_matkul"><br>
SKS: <input type="number" name="sks"><br>
<button type="submit">Simpan</button>
</form>