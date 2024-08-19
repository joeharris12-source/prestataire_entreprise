@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profil de l'entreprise</h1>

    <form action="{{ route('entreprise.update-profil') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="{{ $entreprise->name }}" required>
        </div>

        <div class="form-group">
            <label for="firstname">Prénom :</label>
            <input type="text" id="firstname" name="firstname" value="{{ $entreprise->firstname }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="{{ $entreprise->email }}" required>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="{{ $entreprise->telephone }}" required>
        </div>

        <div class="form-group">
            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" value="{{ $entreprise->ville }}" required>
        </div>

        <div class="form-group">
            <label for="quartier">Quartier :</label>
            <input type="text" id="quartier" name="quartier" value="{{ $entreprise->quartier }}" required>
        </div>

        <button type="submit">Modifier</button>
    </form>
</div>
@endsection
