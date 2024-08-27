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

                    <form method="POST" action="{{ route('admin.prestataire.addPrestataire') }}">

                        @csrf
                        <div class="form-group  ">

                            <label for="debut">E-mail </label>
                            <input type="email" class="form-control" id="debut" placeholder="E-mail" name="email"
                                required value="{{ $prestataire->user->email }}">
                        </div>

                        <div class="form-group  ">

                            <label for="debut">Nom </label>
                            <input type="text" class="form-control" id="debut" placeholder="Nom" name="nom"
                                value="{{ $prestataire->user->nom }}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Prenom</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="prenom"
                                placeholder="Prenom" value="{{ $prestataire->user->prenom }}">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputPassword1">Telephone</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="telephone"
                                placeholder="Telephone" value="{{ $prestataire->user->telephone }}">
                        </div>

                        <input type="text" value="1" name="role" hidden>
                        <input type="text" id="" name="id" value="{{ $prestataire->id }}" hidden>

                        <div class="form-group  ">
                            <label for="debut">Password </label>
                            <input type="password" class="form-control" id="debut" placeholder="password"
                                name="password" value="{{ $prestataire->user->password }}">
                        </div>

                        <label for="exampleFormControlSelect1">Categorie</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="categorie_id" required>

                            @foreach ($categories as $categorie)
                                @if ($prestataire->categorie_id == $categorie->id)
                                    <option value="{{ $categorie->id }}" selected>{{ $categorie->libelle }}
                                    </option>
                                @else
                                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                @endif
                            @endforeach

                        </select>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Metier</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="metier"
                                placeholder="Metier" value="{{ $prestataire->metier }}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Competence</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="competence"
                                placeholder="Competence" value="{{ $prestataire->competence }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Niveau</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="niveau"
                                placeholder="Niveau" value="{{ $prestataire->niveau }}">
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
