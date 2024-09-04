<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/connexion.css') }}">
    <title>Connexion</title>
</head>
<body>
    <div class="container-principale">
        <header>
            <nav>
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/1628624206036.jpg') }}" alt="" class="logo"></a>
                <ul>
                    <li><a href="{{ route('home') }}">ACCEUIL</a></li>
                </ul>
            </nav>
        </header>
        <div class="overlay"></div>
        <div class="form-container">
            <h2>Connexion</h2>
            <form action="{{ route('users.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <input type="submit" value="Se connecter">
            </form>
        </div>
    
    </div>
</body>
</html>
