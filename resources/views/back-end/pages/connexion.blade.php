<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('back-end/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('back-end/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back-end/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img"
                        src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Veuillez
                    entrer vos informations d'utilisateur
                </span></div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.connexion.perform') }}">
                    @if ($errors->any())
                        <div class="text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" placeholder="Email"
                            autocomplete="off" name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password"
                            placeholder="Mot de passe" name="password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Se
                                souvenir de moi</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Connexion</button>
                </form>
            </div>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ asset('back-end/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
