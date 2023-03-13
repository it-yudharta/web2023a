<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota</title>
</head>
<body>
    <h3>
        Daftar Anggota
        <a href="/members/create">Tambah Data</a>
    </h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        @foreach($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->age }}</td>
            <td>{{ $member->phone }}</td>
            <td><a href="/members/{{$member->id}}/edit">Ubah</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
