<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Projet</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dashEntr.css') }}">
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('profilEntr') }}">Profil</a></li>
                    <li><a href="{{ route('historique') }}">Historique</a></li>
                    <li><a href="{{ route('projet') }}" class="active">Ajouter un projet</a></li>
                    <li><a href="#" onclick="confirmDeletion(event)">Supprimer Profil</a></li>
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
            <h2 class="dashboard-title">Modifier le Projet</h2>

            <form action="{{ route('projets.update', $projet->id) }}" method="POST" enctype="multipart/form-data" class="form-dashboard">
                @csrf
                @method('PUT')

                <div class="form-group-dashboard">
                    <label for="intitule" class="label-dashboard">Intitulé du Projet</label>
                    <input type="text" class="input-dashboard" id="intitule" name="intitule" value="{{ old('intitule', $projet->intitule) }}" required>
                </div>

                <div class="form-group-dashboard">
                    <label for="description" class="label-dashboard">Description</label>
                    <textarea class="textarea-dashboard" id="description" name="description" required>{{ old('description', $projet->description) }}</textarea>
                </div>

                <div class="form-group-dashboard">
                    <label for="budget" class="label-dashboard">Budget</label>
                    <input type="number" class="input-dashboard" id="budget" name="budget" value="{{ old('budget', $projet->budget) }}" required>
                </div>

                <div class="form-group-dashboard">
                    <label for="temps_execution" class="label-dashboard">Temps d'Exécution (en semaine)</label>
                    <input type="number" class="input-dashboard" id="temps_execution" name="temps_execution" value="{{ old('temps_execution', $projet->temps_execution) }}" required>
                </div>

                <div class="form-group-dashboard">
                    <label for="cahier_charge" class="label-dashboard">Cahier de Charge (PDF)</label>
                    <input type="file" class="file-input-dashboard" id="cahier_charge" name="cahier_charge">
                    @if($projet->cahier_charge)
                        <p>Actuel : <a href="{{ Storage::url($projet->cahier_charge) }}" target="_blank">Voir le fichier</a></p>
                    @endif
                </div>

                <div class="form-group-dashboard">
                    <button type="submit" class="btn-dashboard">Mettre à jour le Projet</button>
                </div>
            </form>
        </main>
    </div>

    <!-- Modal de confirmation pour la suppression -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Confirmation de suppression</h2>
            <p>Êtes-vous sûr de vouloir supprimer votre profil ? Cette action est irréversible.</p>
            <div class="modal-buttons">
                <button id="confirmDelete" class="btn-confirm">Oui, supprimer</button>
                <button id="cancelDelete" class="btn-cancel">Annuler</button>
            </div>
        </div>
    </div>
</body>
</html>
