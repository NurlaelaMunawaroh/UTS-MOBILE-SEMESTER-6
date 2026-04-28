<h1>Data Matkul</h1>
<a href="/matkul/create">Tambah</a>

<table border="1">
<tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>SKS</th>
    <th>Aksi</th>
</tr>

@foreach($matkuls as $m)
<tr>
    <td>{{ $m->kode_matkul }}</td>
    <td>{{ $m->nama_matkul }}</td>
    <td>{{ $m->sks }}</td>
    <td>
        <a href="/matkul/{{ $m->id }}/edit">Edit</a>
        <form action="/matkul/{{ $m->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>