<!doctype html>
<html lang="en">

@include('back-end.partials.head')

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper p-0">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-expand dashboard-top-header bg-white">
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- brand logo -->
                <!-- ============================================================== -->
                <div class="dashboard-nav-brand">
                    <a class="dashboard-logo" href="../index.html">It Freelance</a>
                </div>
                <!-- ============================================================== -->
                <!-- end brand logo -->
                <!-- ============================================================== -->
            </div>
        </nav>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="error-section">
                            <img src="../assets/images/error-img.png" alt="" class="img-fluid">
                            <div class="error-section-content">
                                <h1 class="display-3">L'acces a cette page vous est refusé</h1>

                                <a href="{{ route('admin.connexion') }}" class="btn btn-secondary btn-lg">Retourner a la
                                    connexion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="bg-white p-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-dark text-center">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- end wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    @include('back-end.partials.js')
</body>

</html>
