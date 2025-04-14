@extends('layouts.master')

@section('title', 'Biznews')

@section('content')
    @include('layouts.home.slider')
    {{-- @include('layouts.home.breaking') --}}
    @include('layouts.home.featured')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                @include('layouts.home.latest')
                {{-- <div class="col-lg-4">
                    @include('layouts.home.popular')
                    @include('layouts.home.letter_tag')
                </div> --}}
            </div>
        </div>
    </div>
@endsection    