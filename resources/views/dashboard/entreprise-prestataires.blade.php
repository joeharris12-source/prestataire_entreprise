<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/dashEntr.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Prestataires Inscrits</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            background-color: #2c3e50;
            padding: 20px;
            width: 250px;
            color: #ecf0f1;
        }

        .sidebar .text {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar nav ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 15px;
        }

        .sidebar nav ul li a {
            text-decoration: none;
            color: #bdc3c7;
            font-size: 16px;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar nav ul li a.active,
        .sidebar nav ul li a:hover {
            background-color: #34495e;
            color: #ecf0f1;
        }

        .content {
            flex-grow: 1;
            padding: 30px;
        }

        h1 {
            font-size: 24px;
            color: #34495e;
            text-align: center;
            margin-bottom: 40px;
        }

        .form-group {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .form-control {
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 50px;
            border: 1px solid #ddd;
            width: 300px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }

        .btn {
            margin-left: 10px;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 50px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 10px rgba(0, 91, 187, 0.3);
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 280px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            margin-top: 0;
            font-size: 22px;
            color: #333;
        }

        .card p {
            color: #666;
            margin-bottom: 10px;
        }

        .alert {
            padding: 15px;
            background-color: #e74c3c;
            color: white;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
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
                    <li><a href="{{ route('entreprise-prestataires') }}" class="active">Voir les prestataires</a></li>
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
            <h1>Liste des Prestataires Inscrits</h1>

            <!-- Affichage du message d'erreur -->
            @if (session('error'))
                <div class="alert">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Formulaire de recherche -->
            <form action="{{ route('entreprise-prestataires') }}" method="GET">
                <div class="form-group">
                    <input type="text" name="secteur" class="form-control" placeholder="Rechercher par secteur d'activité" value="{{ request()->input('secteur') }}">
                    <button type="submit" class="btn">Rechercher</button>
                </div>
            </form>

            <!-- Affichage des prestataires si non vide -->
            @if ($prestataires->isNotEmpty())
                <div class="cards-container mt-4">
                    @foreach ($prestataires as $prestataire)
                        <div class="card">
                            <h3>{{ $prestataire->name }}</h3>
                            <p>Email: {{ $prestataire->email }}</p>
                            <p>Secteurs d'Activité: {{ $prestataire->secteurs_activite }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="chart-container" style="margin-top: 30px;">
                <canvas id="chart"></canvas>
                <canvas id="secteursChart" width="400" height="400"></canvas>
            </div>
        </main>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/inscriptions')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('chart').getContext('2d');
                
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates,
                        datasets: [
                            {
                                label: 'Inscriptions par Jour',
                                data: data.inscriptionsParJour,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                fill: true
                            },
                            
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Date'
                                }
                            },
                            y: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Nombre d\'Inscriptions'
                                }
                            }
                        }
                    }
                });
            });
    });
</script>

</body>
</html>
