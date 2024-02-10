<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Home</title>
</head>

<body>
    {{-- navbar  --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">{{ __('home.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('home.highlight') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ __('home.title') }}</h1>
            <p class="lead">{{ __('home.subtitle') }}</p>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="http://upload.bogeng.skom.id/mus/Z7wjcxsYKTwRk6y.png" class="card-img-top" alt="Image">
        <div class="card-body">
            <h5 class="card-title">{{ __('home.title_blog') }}</h5>
            <p class="card-text">{{ __('home.excerpt_blog') }}</p>
            <a href="#" class="btn btn-primary">{{ __('home.button_blog') }}</a>
        </div>
    </div>
    <div
        style="padding: 1rem 1rem; width:100%; text-align:center; background-color:gray; color:white; bottom:0; margin-top: 5rem">
        {{ __('home.footer_copyright') }}
    </div>

    <script src="/js/bootstrap.js"></script>
</body>

</html>
