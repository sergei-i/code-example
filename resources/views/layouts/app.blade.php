<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand bg-light navbar-light">
                <div class="container-fluid">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a
                                class="nav-link menu-link {{ isRouteActive('home') ? 'menu-link__active' : '' }}"
                                href="{{ route('home') }}"
                            >
                                Главная страница
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link menu-link {{ isRouteActive('articles.*') ? 'menu-link__active' : '' }}"
                                href="{{ route('articles.index') }}"
                            >
                                Каталог статей
                            </a>
                        </li>
                    </ul>
                    <a
                        class="d-flex justify-content-end"
                        href="https://github.com/sergei-i/code-example"
                        target="_blank"
                    >
                        <i class="bi bi-github" style="font-size: 2rem; color: #000000;"></i>
                    </a>
                </div>
            </nav>
            @yield('content')
            @yield('vue')
        </div>
    </body>
</html>
