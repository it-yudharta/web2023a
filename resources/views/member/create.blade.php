<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Baru</title>
</head>
<body>
    <h3>Tambah Data Anggota</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/members" method="POST">
        @csrf
        <label for="fname">Nama: </label>
        <input type="text" id="fname" name="name"><br><br>
        <label for="faddress">Alamat: </label>
        <input type="text" id="faddress" name="address"><br><br>
        <label for="fage">Umur: </label>
        <input type="text" id="fage" name="age"><br><br>
        <label for="fphone">Telpon: </label>
        <input type="text" id="fphone" name="phone"><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
