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
                    {{-- <h2 class="pageheader-title">Data Tables</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> --}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Listes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste des entreprises</li>
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
                    <h5 class="card-header">Liste des Entreprises</h5>
                    <div class="col-md-4 offset-md-7">
                        <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Ajouter Entreprise
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Civilité</th>
                                        <th>Responsable</th>


                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($entreprises as $entreprise)
                                        <tr>
                                            <td>{{ $entreprise->id }}</td>
                                            <td>{{ $entreprise->nom_entreprise }}</td>
                                            <td>{{ $entreprise->civilite }}</td>
                                            <td>{{ $entreprise->user->nom }}</td>



                                            <td>
                                                <a href="{{ route('admin.entreprise.edit', $id = $entreprise->id) }}">
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pen"></i> Modifier
                                                    </button>
                                                </a>


                                                <a href="{{ route('admin.entreprise.show', [($id = $entreprise->id)]) }}">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        data-toggle="modal">
                                                        <i class="fa fa-eye"></i> Voir

                                                    </button>

                                                </a>
                                                <button type="button" onclick="deleteData({{ $entreprise->id }})"
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
                                        <th>Civilité</th>
                                        <th>Responsable</th>

                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {!! $entreprises->withQueryString()->links('pagination::bootstrap-5') !!}
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajout Projet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.entreprise.addEntreprise') }}">

                        @csrf
                        <div class="form-group  ">

                            <label for="debut">E-mail </label>
                            <input type="email" class="form-control" id="debut" placeholder="E-mail" name="email"
                                required>
                        </div>

                        <div class="form-group  ">

                            <label for="debut">Nom </label>
                            <input type="text" class="form-control" id="debut" placeholder="Nom" name="nom"
                                required>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Prenom</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="prenom"
                                placeholder="Prenom">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputPassword1">Telephone</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="telephone"
                                placeholder="Telephone">
                        </div>

                        {{-- <div class="form-group  ">
                            <label for="debut">Password </label>
                            <input type="password" class="form-control" id="debut" placeholder="password"
                                name="password">
                        </div> --}}

                        <input type="text" value="2" name="role" hidden>
                        <input type="text" id="" name="id" value="0" hidden>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Lieu</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required
                                name="lieu" placeholder="Lieu">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nom entreprise</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required
                                name="nom_entreprise" placeholder="Nom entreprise">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Fonction</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required
                                name="fonction" placeholder="Fonction">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Civilite</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required
                                name="civilite" placeholder="Civilite">
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
                    <p class="heading">Vous êtes sûr de supprimer cet entreprise ?</p>
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
            var url = '{{ route('admin.entreprise.delete', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
