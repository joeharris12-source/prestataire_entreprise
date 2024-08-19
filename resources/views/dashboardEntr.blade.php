<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/dashEntr.css') }}">
    <title>Tableau de Bord - Entreprise</title>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">
                <img src="{{ asset('assets/images/entreprise-logo.png') }}" alt="Logo Entreprise">
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('entreprise.profil') }}">Profil</a></li>
                    <li><a href="{{ route('entreprise.historique') }}">Historique</a></li>
                    <li><a href="{{ route('entreprise.logout') }}">Déconnexion</a></li>
                    <li><a href="{{ route('entreprise.projet') }}">ajouter un projet</a></li>
                </ul>
            </nav>
        </aside>
        <main class="content">
            <h1>Bienvenue, {{ Auth::guard('entreprise')->user()->name }}</h1>
            <p>Voici votre tableau de bord où vous pouvez gérer vos projets et informations.</p>
        </main>
    </div>
</body>
</html>
