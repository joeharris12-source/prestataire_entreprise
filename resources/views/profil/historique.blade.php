<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Projets</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dashEntr.css') }}">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="text">
                <h2>Tableau de bord</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('profilEntr') }}">Profil</a></li>
                    <li><a href="{{ route('historique') }}">Historique</a></li>
                    <li><a href="{{ route('projet') }}">Ajouter un Projet</a></li>
                    <li><a href="#" onclick="confirmDeletion(event)">Supprimer</a></li>
                    <div class="logout">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                    </div>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <h1>Historique des Projets</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($projets->isEmpty())
                <p>Aucun projet trouvé.</p>
            @else
                <table class="projects-table">
                    <thead>
                        <tr>
                            <th>Intitulé</th>
                            <th>Description</th>
                            <th>Budget</th>
                            <th>Temps d'Exécution</th>
                            <th>Cahier de Charge</th>
                            <th>Actions</th> <!-- Colonne pour les actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projets as $projet)
                            <tr>
                                <td>{{ $projet->intitule }}</td>
                                <td>{{ $projet->description }}</td>
                                <td>{{ $projet->budget }} €</td>
                                <td>{{ $projet->temps_execution }} semaine</td>
                                <td>
                                    @if($projet->cahier_charge)
                                        <a href="{{ Storage::url($projet->cahier_charge) }}" target="_blank">Voir le fichier</a>
                                    @else
                                        Non disponible
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('projets.edit', $projet->id) }}" class="btn-edit">Modifier</a>
                                    <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </main>
    </div>
</body>
</html>
