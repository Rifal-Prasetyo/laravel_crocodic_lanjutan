<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat User</title>
</head>

<body>

    @if ($result)
        {
        User Ditambahkan
        }
    @endif
    <h1>Buat User</h1>
    <form action="{{ route('create') }}" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="Your Name">
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">

        <button type="submit" name="submit">Kirim</button>
    </form>
</body>

</html>
