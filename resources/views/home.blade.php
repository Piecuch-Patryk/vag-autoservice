@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-0 col-lg-3">
            <nav class="nav d-none d-lg-flex flex-column">
                @include('navs.nav')
            </nav>
        </div>
        <div class="col-12 col-lg-9">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        Left
                    </div>
                    <div class="col-0 col-lg-4 d-none d-lg-block">
                        Right
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
