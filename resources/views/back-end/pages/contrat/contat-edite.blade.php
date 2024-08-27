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

                    <form method="POST" action="{{ route('admin.contrat.update', $id = $contrat->id) }}">

                        @csrf



                        <div class="form-group  ">
                            <label for="debut">debut </label>
                            <input type="date" class="form-control" id="debut" placeholder="Date de debut"
                                name="debut" value="{{ $contrat->debut }}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Durée</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="dure"
                                placeholder="dure" value="{{ $contrat->dure }}">
                        </div>

                        <label for="exampleFormControlSelect1">Prestataire</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="projet_id" required>

                            @foreach ($projets as $projet)
                                @if ($contrat->projet->id == $projet->id)
                                    <option value="{{ $projet->id }}" selected>{{ $projet->titre }}</option>
                                @else
                                    <option value="{{ $projet->id }}">{{ $projet->titre }}</option>
                                @endif
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Prestataire</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="prestataire_id" required>

                            @foreach ($prestataires as $prestataire)
                                @if ($contrat->prestataire->id == $prestataire->id)
                                    <option value="{{ $prestataire->id }}" selected>{{ $prestataire->user->nom }}</option>
                                @else
                                    <option value="{{ $prestataire->id }}">{{ $prestataire->user->nom }}</option>
                                @endif
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Entreprise</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="entreprise_id" required>

                            @foreach ($entreprises as $entreprise)
                                @if ($contrat->entreprise->id == $entreprise->id)
                                    <option value="{{ $entreprise->id }}" selected>{{ $entreprise->nom_entreprise }}
                                    </option>
                                @else
                                    <option value="{{ $entreprise->id }}">{{ $entreprise->nom_entreprise }}</option>
                                @endif
                            @endforeach

                        </select>

                        <label for="exampleInputPassword1">Description</label>
                        <div class="form-group">
                            <input type="text" id="" name="id" value="0" hidden>
                            <textarea name="description" id="" cols="50" rows="10">{{ $contrat->description }}</textarea>
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
