<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="container-principale">
        <header>
            <nav>
                <a href="#"><img src="{{ asset('assets/images/1628624206036.jpg') }}" alt="" class="logo"></a>
                <ul>
                    <li><a href="#">ACCEUIL</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="{{route('connexion')}}">SE CONNECTER</a></li>
                    <li class="dropdown">
                        <a href="" class="dropbtn">S'INSCRIRE</a>
                        <div class="dropdown-content">
                            <a href="{{ route('login') }}">Prestataires</a>
                            <a href="{{route('login2')}}">Entreprises</a>
                        </div>
                    </li>                
                </ul>
            </nav>
        </header>
        <div class="overlay"></div>
        <div class="overlay2">
            <div class="overlay2a">
                <div class="text-overlay2a">
                    <p>TROUVEZ-VOUS UN PRESTATAIRE POUR VOTRE PROJET.</p>
                    <p>TRAVAILLEZ SUR LE PROJET D'UNE ENTREPRISE.</p>
                </div>
            </div>
        </div>
        <div class="overlay3">
            <div class="image-container">
                <div class="img-border">
                    <img src="{{ asset('assets/images/tele travail.jpg') }}" alt="">
                </div>
                <p>Travail à distance</p>
            </div>
            <div class="image-container">
                <div class="img-border">
                    <img src="{{ asset('assets/images/travail-presentiel.jpg') }}" alt="">
                </div>
                <p>Travail en présentiel</p>
            </div>
            <div class="image-container">
                <div class="img-border">
                    <img src="{{ asset('assets/images/travail-hybride.jpg') }}" alt="2">
                </div>
                <p>Travail hybride</p>
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
    </div>

</body>


</html>