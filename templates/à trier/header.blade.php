<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=alata:400" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=abhaya-libre:800|alata:400" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=abhaya-libre:800|aclonica:400|alata:400" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>Pokédex</title>
</head>

    <body>
        <header>
                <nav class="nav" style="display :<?=(!$header) ? 'none' : ''?>;">


                    <div class="first-element">
                        <a class="nav__link" href="{{route('main-home')}}"><li>Menu principal</li></a>
                   </div>
                    <div class="second-element">
                        <a class="nav__link" href="{{route('pokemon-list')}}"><li>Liste</li></a>
                        <a class="nav__link" href="{{route('pokemon-types')}}"><li>Types</li></a>
                    </div>

                </nav>
        </header>
