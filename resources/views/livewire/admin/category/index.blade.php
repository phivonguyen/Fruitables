<div>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Categories List</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('category/create') }}">Create</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> New Category </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>success! </strong>{{ session('success') }}
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">
                    <strong>Message: </strong>{{ session('message') }}
                </div>
            @endif
            <div class="container mt-3">
                <table class="table table-striped" border=1>
                    <thead>
                        <tr>
                            <td>Meta Title</td>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Slug</td>
                            <td>Status</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>
                                    {{ $item->meta_title }}
                                </td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset("$item->image") }}" alt="Categories Image"
                                            style="width: 240px; height: 120px">
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->status == '0' ? 'Visible' : 'Hidden' }}</td>
                                <td>
                                    {{ substr($item->description, 0, 20) }}...
                                </td>
                                <td>
                                    <a href="{{ route('category/edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="#" wire:click="deleteCategory({{ $item->id }})"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{-- {{ $categories->links() }} --}}
                </div>

            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h4>Do you really want to delete this category ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
