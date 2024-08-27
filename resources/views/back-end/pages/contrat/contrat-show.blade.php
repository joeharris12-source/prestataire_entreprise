@extends('back-end.layouts.app')
@section('backContent')
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header p-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto d-block">
                                <h2 class="mb-0" style="margin-left: 40%">CONTRAT</h2>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row mb-12">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">Titre Projet</h3></div>
                                <div class="col-6">{{ $contrat->projet->titre }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">Nom du prestataire </h3></div>
                                <div class="col-6">{{ $contrat->prestataire->user->nom }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="text-dark mb-1">Nom entreprise </h3></div>
                                <div class="col-6">{{ $contrat->entreprise->nom_entreprise }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="text-dark mb-1">Durée </h3></div>
                                <div class="col-6">{{ $contrat->dure }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="text-dark mb-1">Début</h3></div>
                                <div class="col-6">{{ $contrat->debut }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="text-dark mb-1">Description</h3></div>
                                <div class="col-6">{{ $contrat->description }}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    @include('back-end.partials.footer')
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
    </div>
@endsection
