<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3>Masuk ke Aplikasi</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/login" method="POST">
        @csrf
        <label for="femail">Email: </label>
        <input type="text" id="femail" name="email"><br><br>
        <label for="fpassword">Password: </label>
        <input type="password" id="fpassword" name="password"><br><br>
        <button type="submit">Masuk</button>
    </form>

</body>
</html>
