<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Prestataire</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dashPres.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script>
        function confirmDeletion(event) {
            event.preventDefault(); // Empêche l'action par défaut du lien

            // Affiche une boîte de dialogue de confirmation
            if (confirm("Êtes-vous sûr de vouloir supprimer votre profil ? Cette action est irréversible.")) {
                // Si l'utilisateur clique sur "Oui", soumettre le formulaire de suppression
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</head>

<body>
     <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div>
                <h2>Tableau de bord</h2>
                <ul>
                <li><a href="{{ route('profil') }}">Mon Profil</a></li>
                <li><a href="#">Historique</a></li>
                <li><a href="#" onclick="confirmDeletion(event)">Supprimer Profil</a></li>
                </ul>
            </div>
            <div class="logout">
                <a href="#">Déconnexion</a>
            </div>
        </aside>

        <!-- Contenu Principal -->
        <main class="content">
            <h1>Bienvenue sur votre tableau de bord, {{ Auth::user()->name }} {{ Auth::user()->firstname }}</h1>
            <p>Ici, vous pouvez gérer vos informations, consulter vos projets et bien plus encore.</p>
            <form id="delete-form" action="{{ route('delete-profil') }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </main>
    </div>
</body>

</html>