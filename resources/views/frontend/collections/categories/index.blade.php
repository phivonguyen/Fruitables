@extends('layouts.app')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Categories</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Collections</a></li>
            <li class="breadcrumb-item active text-white">Categories</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Categories of Fruitables</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            {{-- <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="volvo">Nothing</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @foreach ($categories as $cat)
                                @if ($cat->status != '1') <!-- Check if status is not 'Hidden' -->
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <a href="{{ url('/collections/' . $cat->slug) }}">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    @if ($cat->image)
                                                        <img src="{{ asset($cat->image) }}"
                                                            class="img-fluid w-100 rounded-top" alt="{{ $cat->name }}"
                                                            style="width: 260px; height: 180px">
                                                    @else
                                                        <p>No Image Available</p>
                                                    @endif
                                                </div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $cat->name }}</h4>
                                                    <p></p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <a href="{{ url('/collections/' . $cat->slug) }}"
                                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i>View
                                                            categories</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log("jQuery loaded successfully!");
            $(".category-link").click(function(e) {
                e.preventDefault();
                var categoryId = $(this).data("category");
                $(".category-product").hide();
                $(".category-" + categoryId).show();
            });
        });
    </script>
    <!-- Fruits Shop End-->
@endsection
