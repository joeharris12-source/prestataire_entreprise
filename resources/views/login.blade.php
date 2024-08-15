<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title>Inscription Prestataire</title>
</head>

<body>
    <div class="container-principale">
        <header>
            <nav>
                <a href="#"><img src="{{ asset('assets/images/1628624206036.jpg') }}" alt="" class="logo"></a>
                <ul>
                    <li><a href="{{ route('home') }}">ACCUEIL</a></li>
                </ul>
            </nav>
        </header>
        <div class="overlay"></div>
        <div class="form-container">
            <h2>Inscription Prestataire</h2>
            
                <form action="{{ route('prestataire.register') }}" method="POST" style="display: grid;grid-template-columns: repeat(2,1fr); gap:20px">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Prénom :</label>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone :</label>
                        <input type="text" id="telephone" name="telephone">
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville :</label>
                        <input type="text" id="ville" name="ville">
                    </div>
                    <div class="form-group">
                        <label for="secteurs_activite">Secteurs d'activité :</label>
                        <input type="text" id="secteurs_activite" name="secteurs_activite">
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse :</label>
                        <input type="text" id="adresse" name="adresse">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmer le mot de passe :</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2; text-align: center;">
                        <input type="submit" value="S'inscrire">
                    </div>
                </form>
           
        </div>
    </div>
    <footer>
        <div class="footer">
            <div class="footer-left">
                <img src="{{ asset('assets/images/1628624206036.jpg') }}" alt="" class="logo">
            </div>
            <div class="footer-center">
                <p>&copy; 2024 SPARK CORPORATION</p>
            </div>
            <div class="footer-right">
                <div class="contact-info">
                    <h2>Contactez-nous</h2>
                    <h3>+228 00 00 00 00</h3>
                </div>
                <div class="reseau-info">
                    <div class="reseau-info-title">
                        <h2>Rejoignez-nous</h2>
                    </div>
                    <div class="images">
                        <img src="{{ asset('assets/images/X.png') }}" alt="twitter">
                        <img src="{{ asset('assets/images/linkedIN1.png') }}" alt="linkedin">
                        <img src="{{ asset('assets/images/facebook1.png') }}" alt="facebook">
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>