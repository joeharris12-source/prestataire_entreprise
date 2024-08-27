@extends('back-end.layouts.app')
@section('backContent')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    {{-- <h2 class="pageheader-title">Data Tables</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> --}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Modifier</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Modifier categorie</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- ============================================================== -->
        <!-- basic form -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Basic Form</h5>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.projet.addProjet') }}">

                        @csrf

                        <label for="exampleFormControlSelect1">Entreprise</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="entreprise_id" required>

                            @foreach ($entreprises as $entreprise)
                                @if ($projet->entreprise->id == $entreprise->id)
                                    <option value="{{ $entreprise->id }}" selected>{{ $entreprise->nom_entreprise }}
                                    </option>
                                @else
                                    <option value="{{ $entreprise->id }}">{{ $entreprise->nom_entreprise }}</option>
                                @endif
                            @endforeach

                        </select>

                        <div class="form-group">
                            <input type="text" name="id" value="{{ $projet->id }}" hidden>
                            <label for="debut">Type prestation </label>
                            <input type="text" class="form-control" id="debut" placeholder="Type prestation"
                                name="type_prestation" value="{{ $projet->type_prestation }}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Titre</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="titre"
                                placeholder="titre" value="{{ $projet->titre }}">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputPassword1">Debut</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="debut"
                                placeholder="Debut" value="{{ $projet->debut }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Lieu</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="lieu"
                                placeholder="Lieu" value="{{ $projet->lieu }}">
                        </div>


                        <label for="exampleFormControlSelect1">Categorie</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="categorie_id" required>

                            @foreach ($categories as $categorie)
                                @if ($projet->categorie_id == $categorie->id)
                                    <option value="{{ $categorie->id }}" selected>{{ $categorie->libelle }}
                                    </option>
                                @else
                                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                @endif
                            @endforeach

                        </select>

                        <label for="exampleInputPassword1">Description</label>
                        <div class="form-group">

                            <textarea name="description" id="" cols="50" rows="10">{{ $projet->description }}</textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button class="btn btn-space btn-secondary">Cancel</button>
                    </form>



                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic form -->
        <!-- ============================================================== -->
    @endsection
