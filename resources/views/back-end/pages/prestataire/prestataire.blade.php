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
                                <li class="breadcrumb-item active" aria-current="page">Liste des prestataire</li>
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
                    <h5 class="card-header">Liste des Prestataire</h5>
                    <div class="col-md-4 offset-md-7">
                        <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Ajouter Prestataire
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Niveau</th>
                                        <th>metier</th>


                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($prestataires as $prestataire)
                                        <tr>
                                            <td>{{ $prestataire->id }}</td>
                                            <td>{{ $prestataire->user->nom }}</td>
                                            <td>{{ $prestataire->user->prenom }}</td>
                                            <td>{{ $prestataire->niveau }}</td>

                                            <td>{{ $prestataire->metier }}</td>

                                            <td>
                                                <a href="{{ route('admin.prestataire.edit', $id = $prestataire->id) }}">
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pen"></i> Modifier
                                                    </button>
                                                </a>

                                                <a href="{{ route('admin.prestataire.show', [($id = $prestataire->id)]) }}">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        data-toggle="modal">
                                                        <i class="fa fa-eye"></i> Voir

                                                    </button>

                                                </a>
                                                <button type="button" onclick="deleteData({{ $prestataire->id }})"
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
                            {!! $prestataires->withQueryString()->links('pagination::bootstrap-5') !!}
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajout Prestataire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.prestataire.addPrestataire') }}">

                        @csrf
                        <div class="form-group  ">

                            <label for="debut">E-mail </label>
                            <input type="email" class="form-control" id="debut" placeholder="E-mail" name="email"
                                required>
                        </div>

                        <div class="form-group  ">

                            <label for="debut">Nom </label>
                            <input type="text" class="form-control" id="debut" placeholder="Nom" name="nom">
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

                        <input type="text" value="1" name="role" hidden>
                        <input type="text" id="" name="id" value="0" hidden>

                        {{-- <div class="form-group  ">
                            <label for="debut">Password </label>
                            <input type="password" class="form-control" id="debut" placeholder="password"
                                name="password">
                        </div> --}}

                        <label for="exampleFormControlSelect1">Categorie</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="categorie_id" required>
                            <option>choisir</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                            @endforeach

                        </select>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Metier</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required
                                name="metier" placeholder="Metier">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Competence</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required
                                name="competence" placeholder="Competence">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Niveau</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required
                                name="niveau" placeholder="Niveau">
                        </div>

                        <div class="col-md-12" id="">
                            <div class="form-group">
                                <span><i class="fa fa-upload"></i> Télécharger CV
                                    (Optionnel)</span>
                                <input type="file" class="upload" name="cv_file">
                                <small class="form-text text-muted">Format autorisé doc, docx ou
                                    PDF.
                                    Taille maximale de 2MB</small>
                            </div>
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
                    <p class="heading">Vous êtes sûr de bloquer cet prestataire ?</p>
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
            var url = '{{ route('admin.prestataire.delete', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
