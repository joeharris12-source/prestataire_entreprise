<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title>Inscription Prestataire</title>
   <script> 
    document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const submitButton = document.querySelector('input[type="submit"]');
    const form = document.querySelector('form');

    confirmPasswordInput.addEventListener('input', function () {
        const matchMessage = document.getElementById('match-message');

        if (passwordInput.value === confirmPasswordInput.value) {
            confirmPasswordInput.style.borderColor = 'green';  // Appliquer directement le style pour déboguer
            confirmPasswordInput.style.boxShadow = '0 0 8px rgba(46, 176, 240, 0.3)';  // Ajouter une ombre légère pour la visibilité
            if (!matchMessage) {
                const span = document.createElement('span');
                span.id = 'match-message';
                span.className = 'password-match';
                span.textContent = 'Les mots de passe correspondent.';
                span.style.color = 'green';  // Style direct pour le texte
                confirmPasswordInput.parentNode.appendChild(span);
            } else {
                matchMessage.textContent = 'Les mots de passe correspondent.';
                matchMessage.style.color = 'green';  // Style direct pour le texte
            }
        } else {
            confirmPasswordInput.style.borderColor = 'red';  // Appliquer directement le style pour déboguer
            confirmPasswordInput.style.boxShadow = '0 0 8px rgba(255, 0, 0, 0.3)';  // Ajouter une ombre légère pour la visibilité
            if (!matchMessage) {
                const span = document.createElement('span');
                span.id = 'match-message';
                span.className = 'password-mismatch';
                span.textContent = 'Les mots de passe ne correspondent pas.';
                span.style.color = 'red';  // Style direct pour le texte
                confirmPasswordInput.parentNode.appendChild(span);
            } else {
                matchMessage.textContent = 'Les mots de passe ne correspondent pas.';
                matchMessage.style.color = 'red';  // Style direct pour le texte
            }
        }
    });

    form.addEventListener('submit', function (e) {
        if (passwordInput.value !== confirmPasswordInput.value) {
            e.preventDefault();
            alert('Les mots de passe ne correspondent pas. Veuillez les vérifier avant de soumettre.');
        }
    });
});
</script>

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
            <div class="button-group">
                <a href="" class="btn-particulier">Particulier</a>
                <a href="{{ route('login1') }}" class="btn-entreprise">Entreprise</a>
            </div>
            <form action="{{ route('prestataire.register') }}" method="POST" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px">
                @csrf
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="error-message">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom :</label>
                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
                    @if ($errors->has('firstname'))
                        <span class="error-message">{{ $errors->first('firstname') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="error-message">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone :</label>
                    <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}">
                    @if ($errors->has('telephone'))
                        <span class="error-message">{{ $errors->first('telephone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ville">Ville :</label>
                    <input type="text" id="ville" name="ville" value="{{ old('ville') }}">
                    @if ($errors->has('ville'))
                        <span class="error-message">{{ $errors->first('ville') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="secteurs_activite">Secteurs d'activité :</label>
                    <input type="text" id="secteurs_activite" name="secteurs_activite" value="{{ old('secteurs_activite') }}">
                    @if ($errors->has('secteurs_activite'))
                        <span class="error-message">{{ $errors->first('secteurs_activite') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}">
                    @if ($errors->has('adresse'))
                        <span class="error-message">{{ $errors->first('adresse') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="error-message">{{ $errors->first('password') }}</span>
                    @endif
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
