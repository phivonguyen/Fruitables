<div>
    @include('livewire.admin.origin.modal-form')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-header">
                    <h4>
                        Origin List
                        <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#addOriginModal">Add Origin</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($origins as $origin)
                                <tr>
                                    <td>{{ $origin->id }}</td>
                                    <td>{{ $origin->name }}</td>
                                    <td>
                                        @if ($origin->category)
                                            {{ $origin->category->name }}
                                        @else
                                            No available category
                                        @endif
                                    </td>
                                    <td>{{ $origin->slug }}</td>
                                    <td>{{ $origin->status == 1 ? 'hidden' : 'visible' }}</td>
                                    <td><a href="#" wire:click='editOrigin({{ $origin->id }})'
                                            data-bs-toggle="modal" data-bs-target="#updateOriginModal"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#" wire:click='deleteOrigin({{ $origin->id }})'
                                            data-bs-toggle="modal" data-bs-target="#deleteOriginModal"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5">No origin is founded!</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $origins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new DataTable('#example');
</script>
@push('scripts')
    <script>
        // Listen for the 'close-modal' event and close the modal
        window.addEventListener('close-modal', event => {
            $('#updateOriginModal').modal('hide');
            $('#deleteOriginModal').modal('hide');
            $('#addOriginModal').modal('hide');
        });
    </script>
@endpush
