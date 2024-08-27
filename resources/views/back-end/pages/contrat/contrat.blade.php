@extends('back-end.layouts.app')
@section('backContent')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Listes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste des contrats</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Liste des Contrats</h5>
                    <div class="col-md-4 offset-md-7">
                        <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Ajouter Contrat
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom Projet</th>
                                        <th>Nom Prestataire</th>

                                        <th>Nom entreprise</th>
                                        <th>durée</th>


                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($contrats as $contrat)
                                        <tr>
                                            <td>{{ $contrat->id }}</td>
                                            <td>{{ $contrat->projet->titre }}</td>
                                            <td>{{ $contrat->prestataire->user->nom }}</td>

                                            <td>{{ $contrat->entreprise->nom_entreprise }}</td>
                                            <td>{{ $contrat->dure }}</td>

                                            <td>

                                                <a href="{{ route('admin.contrat.edit', [($id = $contrat->id)]) }}">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        data-toggle="modal">
                                                        <i class="fa fa-eye"></i> Modifier

                                                    </button>

                                                </a>
                                                <a href="{{ route('admin.contrat.show', [($id = $contrat->id)]) }}">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        data-toggle="modal">
                                                        <i class="fa fa-eye"></i> Voir

                                                    </button>

                                                </a>


                                                <button type="button" onclick="deleteData({{ $contrat->id }})"
                                                    class="btn btn-danger btn-sm waves-effect waves-light"
                                                    data-toggle="modal" data-target="#modalConfirmDeletes">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>

                                            </td>

                                        </tr>
                                    @endforeach

                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Niveau</th>
                                        <th>metier</th>

                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {!! $contrats->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>


    </div>

    <!-- Modal d'ajout -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout Contrat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.contrat.create') }}">

                        @csrf



                        <div class="form-group  ">
                            <label for="debut">debut </label>
                            <input type="date" class="form-control" id="debut" placeholder="Date de debut"
                                name="debut">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Durée</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="dure"
                                placeholder="dure">
                        </div>

                        <label for="exampleFormControlSelect1">Projets</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="projet_id" required>
                            <option>choisir</option>
                            @foreach ($projets as $projet)
                                <option value="{{ $projet->id }}">{{ $projet->titre }}</option>
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Prestataires</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="prestataire_id" required>
                            <option>choisir</option>
                            @foreach ($prestataires as $prestataire)
                                <option value="{{ $prestataire->id }}">{{ $prestataire->user->nom }}</option>
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Entreprise</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="entreprise_id" required>
                            <option>choisir</option>
                            @foreach ($entreprises as $entreprise)
                                <option value="{{ $entreprise->id }}">{{ $entreprise->nom_entreprise }}</option>
                            @endforeach

                        </select>

                        <label for="exampleInputPassword1">Description</label>
                        <div class="form-group">
                            <input type="text" id="" name="id" value="0" hidden>
                            <textarea name="description" id="" cols="50" rows="10" name=""></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>

    </div>


    <!--Modal: modalConfirmDelete-->
    <div class="modal fade" id="modalConfirmDeletes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <p class="heading">Vous êtes sûr de bloquer cet contrat ?</p>
                </div>

                <!--Body-->
                <div class="modal-body">

                    <i class="fas fa-times fa-4x animated rotateIn"></i>

                </div>

                <!--Footer-->
                <div class="modal-footer flex-center">
                    <form method="GET" id="deleteForm" action="">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger">Oui</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Non</button>
                    </form>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalConfirmDelete-->
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.contrat.delete', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
