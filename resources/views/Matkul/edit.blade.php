<h1>Edit Matkul</h1>

<form action="/matkul/{{ $matkul->id }}" method="POST">
@csrf
@method('PUT')

Kode: <input type="text" name="kode_matkul" value="{{ $matkul->kode_matkul }}"><br>
Nama: <input type="text" name="nama_matkul" value="{{ $matkul->nama_matkul }}"><br>
SKS: <input type="number" name="sks" value="{{ $matkul->sks }}"><br>

<button type="submit">Update</button>
</form>