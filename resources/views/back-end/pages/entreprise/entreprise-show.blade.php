@extends('back-end.layouts.app')
@section('backContent')
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header p-4">
                    <div class="container">
                        <div class="row" style="text-align: center">
                            <div class="col-md-6 mx-auto d-block">
                                <h2 class="mb-0"> ENTREPRISE</h2>
                                <p>{{ $entreprise->nom_entreprise }}</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row mb-12">
                        <div class="row form-row" style="margin-left: 30%">
                            <div class="col-12 col-sm-6">
                                <h3 class="mb-3">Nom Entreprise</h3>
                            <p>{{ $entreprise->nom_entreprise }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="mb-3">Fonction</h3>
                                <p>{{ $entreprise->fonction }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="mb-3">Civilite</h3>
                                <p>{{ $entreprise->civilite }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="mb-3">Nom Responsable</h3>
                                <p>{{ $entreprise->user->nom }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="mb-3">Responsable Prenom </h3>
                            <p>{{ $entreprise->user->prenom }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="text-dark mb-1">telephone</h3>
                            <p>{{ $entreprise->user->telephone }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="text-dark mb-1">Email</h3>
                                <p>{{ $entreprise->user->email }}</p>
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
