@extends('layouts.main')
@section('title', $cat_alias->alias)

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/categories.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url('/images/{{ $category->img }}')"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{ $category->title }}<span>.</span></div>
                                <div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis
                                        fermentum luctus.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Product Sorting -->
                    <div
                        class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                        <div class="results">Showing <span>{{ $category->products->count() }}</span> results</div>
                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Sort by</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }' data-order="default">
                                                <span>Default</span></li>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'
                                                data-order="price"><span>Price</span></li>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'
                                                data-order="name"><span>Name</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                        <!-- Product -->
                        @foreach($category->products as $product)
                        <div class="product">
                            <div class="product_image"><img src="/images/{{ $product->img ? $product->img : 'no_images.png' }}" alt=""></div>
                            <div class="product_extra product_new"><a href="{{ route('showCategory', $category->title) }}">{{ $category->title }}</a></div>
                            <div class="product_content">
                                <div class="product_title"><a href="{{ route('showProduct', [$category->title, $product->id]) }}">{{ $product->title }}</a></div>
                                <div class="product_price">{{ $product->price }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="product_pagination">
                        <ul>
                            <li class="active"><a href="#">01.</a></li>
                            <li><a href="#">02.</a></li>
                            <li><a href="#">03.</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script src="/js/categories.js"></script>
    <script>
        $(document).ready(function () {
            $('.product_sorting_btn').click(function () {
                let orderBy = $(this).data('order');
                console.log(orderBy)
            })
            $.ajax({
                url : '{{ route("showCategory", $category->title) }}',
                type : 'GET',
                data : {
                    orderBy : orderBy
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function (result){
                    console.log(result);
                },
                dataType : '',
            })
        })
    </script>
@endsection
