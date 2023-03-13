<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <h3>Update Anggota</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/members/{{$member->id}}" method="POST">
        @csrf
        @method('PUT')
        <label for="fname">Nama: </label>
        <input type="text" id="fname" name="name" value="{{$member->name}}"><br><br>
        <label for="faddress">Alamat: </label>
        <input type="text" id="faddress" name="address" value="{{$member->address}}"><br><br>
        <label for="fage">Umur: </label>
        <input type="text" id="fage" name="age" value="{{$member->age}}"><br><br>
        <label for="fphone">Telpon: </label>
        <input type="text" id="fphone" name="phone" value="{{$member->phone}}"><br><br>
        <button type="submit">Simpan</button>
    </form>
    <br><br>
    <form action="/members/{{$member->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus Data</button>
    </form>
</body>
</html>
