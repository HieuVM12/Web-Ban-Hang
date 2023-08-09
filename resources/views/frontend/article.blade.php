@extends('frontend.layout.main')

@section('main-content')
    <style>
        .gategory-product li {
            height: 345px;
            margin-bottom: 20px;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- BSTORE-BREADCRUMB START -->
            <div class="bstore-breadcrumb">
                <a href="/">Trang chủ <span><i class="fa fa-caret-right"></i></span></a>
                <a href="{{ route('shop.articles') }}">Tin tức </a>
            </div>
            <!-- BSTORE-BREADCRUMB END -->
        </div>
    </div>
    <div class="row">
        <ul class="gategory-product">
            <!-- SINGLE ITEM START -->
            @foreach($articless as $article)
                <li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="{{ route('shop.detailArticle',['slug' => $article->slug]) }}"><img src="{{ asset($article->image) }}" alt="product-image" style="height: 262.2px" /></a>
                        </div>
                        <br>
                        <div class="product-info">
                            <a href="{{ route('shop.detailArticle',['slug' => $article->slug]) }}"><strong>{{ $article->title }}</strong></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {!! $articless->links() !!}
    </div>
@endsection
