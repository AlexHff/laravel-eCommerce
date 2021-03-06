@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="text-align:center; margin: 20px 0 20px 0">
        <div class="col-md-4">
            <form method="POST" action="{{ route('items.search') }}">
                @csrf
                <input type="hidden" name="search" value="Books">
                <a href="javascript:;" onclick="parentNode.submit();" style="color: inherit">
                <img src="https://images-na.ssl-images-amazon.com/images/G/01/gno/SiteDirectory/SD_books_1x._CB274380261_.png" alt="clothing" style="margin-bottom:1em">
                <h3>Books</h3>
                </a>
            </form>
        </div>
        <div class="col-md-4">
            <form method="POST" action="{{ route('items.search') }}">
                @csrf
                <input type="hidden" name="search" value="Music">
                <a href="javascript:;" onclick="parentNode.submit();" style="color: inherit">
                <img src="https://images-na.ssl-images-amazon.com/images/G/01/gno/SiteDirectory/SD_music_1x._CB274422803_.png" alt="music" style="margin-bottom:1em">
                <h3>Music</h3>
                </a>
            </form>
        </div>
    </div>
    <div class="row justify-content-center" style="text-align:center; margin: 20px 0 0 0">
        <div class="col-md-4">
            <form method="POST" action="{{ route('items.search') }}">
                @csrf
                <input type="hidden" name="search" value="Clothing">
                <a href="javascript:;" onclick="parentNode.submit();" style="color: inherit">
                <img src="https://images-na.ssl-images-amazon.com/images/G/01/gno/SiteDirectory/SD_exports_MensFashion1x._CB470927249_.png" alt="music" style="margin-bottom:1em">
                <h3>Clothing</h3>
                </a>
            </form>
        </div>
        <div class="col-md-4">
            <form method="POST" action="{{ route('items.search') }}">
                @csrf
                <input type="hidden" name="search" value="Sports & Outdoors">
                <a href="javascript:;" onclick="parentNode.submit();" style="color: inherit">
                <img src="https://images-na.ssl-images-amazon.com/images/G/01/gno/SiteDirectory/SD_exports_sportsoutdoors1x._CB470927250_.png" alt="music" style="margin-bottom:1em">
                <h3>Sports & Outdoors</h3>
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
