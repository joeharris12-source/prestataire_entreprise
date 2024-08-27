@extends('back-end.layouts.app')
@section('backContent')
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header p-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto d-block">
                                <h2 class="mb-0" style="margin-left: 40%"> PRESTATAIRE</h2>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row mb-12">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">Nom</h3></div>
                                <div class="col-6"><h3>{{ $prestataire->user->nom }}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">Prenom</h3></div>
                                <div class="col-6"><h3>{{ $prestataire->user->prenom }}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">telephone</h3></div>
                                <div class="col-6"><h3>{{ $prestataire->user->telephone }}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">Email</h3></div>
                                <div class="col-6"><h3>{{ $prestataire->user->email }}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">Categorie</h3></div>
                                <div class="col-6"><h3>{{ $prestataire->categorie->libelle}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">Metier</h3></div>
                                <div class="col-6"><h3>{{ $prestataire->metier}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">Competences</h3></div>
                                <div class="col-6"><h3>{{ $prestataire->competence}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><h3 class="mb-3">Niveau</h3></div>
                                <div class="col-6"><h3>{{ $prestataire->niveau}}</h3></div>
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
