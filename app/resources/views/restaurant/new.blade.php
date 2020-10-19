@extends('layouts.app')

@section('content')

<!-- <img class="img-fluid mb-4" src="image/morning-brew-eFSUPUeYs3w-unsplash.jpg" alt="1200❌300"> -->

<div class="container">

    @include('layouts.title')

    <div class="row">

        <div class="col-lg-2 mb-4">
            @include('sidebar.sidebar')
        </div>

        <div class="col-lg-10">
            <div class="new-restaurants">
                <div class="row">
                    @if(Auth::user())
                        <restaurants-list-component :user-id="{{ Auth::id() }}"></restaurants-list-component>
                    @else
                        <restaurants-list-component></restaurants-list-component>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
