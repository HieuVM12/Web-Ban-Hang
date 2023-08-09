@extends('frontend.layout.main')

@section('main-content')
    <!-- MAIN-CONTENT-SECTION START -->
    <!-- MAIN-CONTENT-SECTION START -->
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="index.html">Trang chủ</a>
                        <span><i class="fa fa-caret-right	"></i></span>
                        <span>Tin tức</span>
                        <span><i class="fa fa-caret-right	"></i></span>
                        <span>{{ $article->title }}</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="page-title about-page-title">{{$article->title}}</h2>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- SINGLE-ABOUT-INFO START -->
                    <div class="single-about-info">
                        <div style="text-align: center;">
                            <img src="{{ asset($article->image) }}" class="img-fluid" >
                        </div>
                        <br>
                        <div class="our-company" >
                            {!! $article->description !!}
                        </div>
                    </div>
                </div>
                <!-- SINGLE-ABOUT-INFO END -->

            </div>
    </section>
    <!-- MAIN-CONTENT-SECTION END -->
@endsection
