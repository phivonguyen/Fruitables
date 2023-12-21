@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        ADD PRODUCTS
                        <a href="{{ route('product/index') }}" class="btn btn-primary btn-sm float-end">Back to List</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $item)
                                <div>{{ $item }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/product/' . $product->id) }}" method="post" enctype="multipart/form-data"
                        class="mt-4">
                        @csrf
                        @method('PUT')

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-seo-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-seo" type="button" role="tab" aria-controls="pills-seo"
                                    aria-selected="false">SEO Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-details-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-details" type="button" role="tab"
                                    aria-controls="pills-details" aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-image-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-image" type="button" role="tab" aria-controls="pills-image"
                                    aria-selected="false">Product Images</button>
                            </li>
                        </ul>


                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}"
                                        class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $product->category_id ? 'Was Chosen' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}"
                                        class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Select Origin</label>
                                    <select name="origin" class="form-control" id="">
                                        @foreach ($origins as $item)
                                            <option value="{{ $item->name }}"
                                                {{ $item->id == $product->origin ? 'Is chosen' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea id="editor2" type="text" name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-seo" role="tabpanel" aria-labelledby="pills-seo-tab"
                                tabindex="0">
                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                        class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea type="text" name="meta_description" value="" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" value="" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-details" role="tabpanel"
                                aria-labelledby="pills-details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Original Price</label>
                                            <input type="number" class="form-control" name="original_price"
                                                id="original_price" value="{{ $product->original_price }}" />
                                            <div id="original_price_error" class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Selling Price</label>
                                            <input type="number" class="form-control" name="selling_price"
                                                id="selling_price" value="{{ $product->selling_price }}" />
                                            <div id="selling_price_error" class="text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" class="form-control" name="quantity"
                                                value="{{ $product->quantity }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending (Check: Trending; Not check: Not
                                                trending)</label>
                                            <input type="checkbox" name="trending" style="width: 25px; height:25px;"
                                                {{ $product->trending == '1' ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Featured (Check: Featured; Not check: Not
                                                featured)</label>
                                            <input type="checkbox" name="featured" style="width: 25px; height: 25px;"
                                                {{ $product->featured == '1' ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status (Check: Hidden; Not check: Visible)</label><br>
                                            <input type="checkbox" name="status" style="width: 25px; height: 25px;"
                                                {{ $product->status == '1' ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-image" role="tabpanel"
                                aria-labelledby="pills-image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Uploaded Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                    <div id="productImages">
                                        @if ($product->productImage)
                                            <div class="row">
                                                @foreach ($product->productImage as $item)
                                                    <div class="col-md-2" id="image_{{ $item->id }}">
                                                        <img src="{{ asset($item->image) }}" alt=""
                                                            style="width:80px; height:80px" class="me-4 border">
                                                        <a href="javascript:void(0);"
                                                            onclick="removeImage({{ $item->id }})"
                                                            class="d-block">Remove</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <h4>No Image Added</h4>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sellingPriceInput = document.getElementById('selling_price');
            var originalPriceInput = document.getElementById('original_price');
            var sellingPriceError = document.getElementById('selling_price_error');
            var originalPriceError = document.getElementById('original_price_error');

            sellingPriceInput.addEventListener('blur', function() {
                validatePrices();
            });

            originalPriceInput.addEventListener('blur', function() {
                validatePrices();
            });

            function validatePrices() {
                var sellingPrice = parseFloat(sellingPriceInput.value);
                var originalPrice = parseFloat(originalPriceInput.value);

                sellingPriceError.innerText = '';
                originalPriceError.innerText = '';

                if (!isNaN(sellingPrice)) {
                    if (sellingPrice >= originalPrice || isNaN(originalPrice)) {
                        sellingPriceError.innerText = 'Selling Price must be less than Original Price';
                    }
                }
            }

            document.getElementById('productForm').addEventListener('submit', function(event) {
                validatePrices();

                if (parseFloat(sellingPriceInput.value) >= parseFloat(originalPriceInput.value)) {
                    event.preventDefault();

                    alert('Selling Price must be less than Original Price');

                    return false;
                }
            });
        });
    </script>
    <script>
        function removeImage(imageId) {
            var confirmation = confirm("Are you sure you want to remove this image?");
            if (confirmation) {
                $.ajax({
                    url: '/admin/product-image/' + imageId + '/delete',
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            $('#image_' + imageId).remove();
                            alert('Image deleted successfully');
                        } else {
                            alert('Error deleting image: ' + response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error deleting image: ' + error);
                    }
                });
            }
        }
    </script>
@endsection
