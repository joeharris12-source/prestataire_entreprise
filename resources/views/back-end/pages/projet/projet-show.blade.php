@extends('back-end.layouts.app')
@section('backContent')
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card" >
                <div class="card-header p-4">
                    <div class="container">
                        <div class="row" style="text-align: center">
                            <div class="col-md-6 mx-auto d-block">
                                <h2 class="mb-0"> PROJET</h2>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body" >
                    <div class="row mb-12">
                        <div class="row form-row" style="margin-left: 30%">
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">Titre</h4>
                                <p>{{ $projet->titre  }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">Debut Projet</h4>
                                <p>{{ $projet->debut  }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">Type prestation</h4>
                                <p>{{ $projet->type_prestation  }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">Description</h4>
                                <p>{{ $projet->description  }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">Lieu</h4>
                                <p>{{ $projet->lieu  }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">Categorie</h4>
                                <p>{{ $projet->categorie->libelle  }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
   <a href="{{ route('admin.projet') }}" style="color:blue;font-weight: bold;">Retour</a>
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
