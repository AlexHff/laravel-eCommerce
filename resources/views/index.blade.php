@extends('layouts.app')
@section('title', 'Welcome')

@section('content')
    <main role="main">

    <div class="container" style="margin-bottom: 2em">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/storage/images/clothing.jpg" alt="clothing" style="max-height: 675px">
                    <div class="carousel-caption d-none d-md-block" style="color: black">
                        <h2><strong>Look out for your next summer look!</strong></h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/storage/images/music.jpg" alt="music" style="max-height: 675px">
                <div class="carousel-caption d-none d-md-block" style="color: black">
                    <h2><strong>Get your favorite songs now!</strong></h2>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/storage/images/books.jpg" alt="books" style="max-height: 675px">
                <div class="carousel-caption d-none d-md-block">
                    <h2><strong>Take a look at our book collection!</strong></h2>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
        <div class="col-md-4">
            <h2>Free Shipping</h2>
            <p>All orders of items across any product category qualify for FREE Shipping.<br>With free shipping, your order will be delivered 5-8 business days after all your items are available to ship, including pre-order items.</p>
            <p><a class="btn btn-primary" href="/items" role="button">Shop now &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Free Returns</h2>
            <p>You can return many items sold on Ecezon.com. When you return an item, you may see different return options depending on the seller, item, or reason for return.</p>
            <p><a class="btn btn-primary" href="/items" role="button">Shop now &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Easy and fast payment</h2>
            <p>Stripe provides everything you need to create quick and effective Ecommerce experiences.</p>
            <p><a class="btn btn-primary" href="https://stripe.com/" role="button">Learn more &raquo;</a></p>
        </div>
        </div>

        <hr>

    </div> <!-- /container -->

    </main>


@endsection
