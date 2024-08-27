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
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Basic Form</h5>
                <div class="card-body">
                    <form action="{{ route('admin.categorie.update', $id = $categorie->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inputUserName">Libelle</label>
                            <input id="inputUserName" type="text" name="libelle" data-parsley-trigger="change"
                                required="" placeholder="Libelle" autocomplete="off" class="form-control"
                                value="{{ $categorie->libelle }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Description</label>
                            <textarea class="form-control" id="exampleTextarea" rows="5" name="description">{{ $categorie->description }}</textarea>
                        </div>


                        {{-- <div class="form-group">
                            <label for="inputImage">Ajouter une image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputImage"
                                        aria-describedby="inputImageAddon" name="image_path"
                                        value="{{ $categorie->image_path }}">
                                    <label class="custom-file-label" for="inputImage">Choisir un fichier</label>
                                </div>

                            </div>
                        </div> --}}


                        <div class="col-sm-6 pl-0">
                            <p class="text-right">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <button class="btn btn-space btn-secondary">Cancel</button>
                            </p>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic form -->
    <!-- ============================================================== -->
@endsection
