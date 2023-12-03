<div>
    <div>
        <div class="page-header">
            <h3 class="page-title">Advertisement List</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('advertisement/create') }}">Create New Advertisment</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> New advertisement </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>success!</strong>{{ session('success') }}
                </div>
            @endif
            <div class="container mt-3">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Created_at</td>
                            <td>Updated_at</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($advertisement as $item)
                        <tr>
                            <td>
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="max-width: 100px;">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                @if ($item->status)
                                    <span class="badge bg-danger">Hidden</span>
                                @else
                                    <span class="badge bg-success">Presently</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="{{ route('advertisement/edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="#" wire:click="deleteAdvertisement({{ $item->id }})"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $advertisement->links() }}
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">advertisement Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroyAdvertisement">
                        <div class="modal-body">
                            <h4>Do you really want to delete this Advertisement ?</h4>
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
