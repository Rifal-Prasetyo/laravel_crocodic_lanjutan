<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
</head>

<body>

    @if ($result)
        {
        User DIupadte
        }
    @endif
    <h1>Update User</h1>
    <form action="{{ route('update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $users->id }}">
        <input type="text" name="name" id="name" placeholder="Your Name" value="{{ $users->name }}">
        <input type="email" placeholder="Email" name="email" value="{{ $users->email }}">
        <input type="password" placeholder="Password" name="password" value="{{ $users->password }}">

        <button type="submit" name="submit">Kirim</button>
    </form>
</body>

</html>
