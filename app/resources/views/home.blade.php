@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Sidebar Page
        <small>Subheading</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-2 mb-4">
            <div class="list-group">
                <a href="index.html" class="list-group-item">Home</a>
                <a href="about.html" class="list-group-item">About</a>
                <a href="services.html" class="list-group-item">Services</a>
                <a href="contact.html" class="list-group-item">Contact</a>
                <a href="portfolio-1-col.html" class="list-group-item">tfolio</a>
                <a href="portfolio-2-col.html" class="list-group-item"> Portfolio</a>
                <a href="portfolio-3-col.html" class="list-group-item">Portfolio</a>
                <a href="portfolio-4-col.html" class="list-group-item">Portfolio</a>
                <a href=.html" class="list-group-item"> Item</a>
                <a href="blog-home-1.html" class="list-group-item">Home 1</a>
                <a href="404.html" class="list-group-item">404</a>
                <a href="pricing.html" class="list-group-item">Pricing Table</a>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row">
        <!-- Content Column -->
                <div class="col-lg-4 mb-2">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="" alt="700❌400"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project One</a>
                            </h4>
                            <p class="card-text">, dolorem!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="" alt="700❌400"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project One</a>
                            </h4>
                            <p class="card-text">Lorl, dolorem!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="" alt="700❌400"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project One</a>
                            </h4>
                            <p class="card-text">Lorolorem!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="" alt="700❌400"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Project One</a>
                            </h4>
                            <p class="card-text">Lorolorem!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection
