<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h1>Info User From Session</h1>
        <ul class="list-group">
            <li class="list-group-item">{{ $user->name }}</li>
            <li class="list-group-item">{{ $user->email }}</li>
        </ul>
    </div>
    <script src="/js/bootstrap.js"></script>
</body>

</html>
