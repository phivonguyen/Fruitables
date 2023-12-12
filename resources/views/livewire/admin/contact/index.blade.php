<div>
    <div>
        <div class="page-header">
            <h3 class="page-title">Contact List</h3>
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
                            <td>Name</td>
                            <td>Email</td>
                            <td>Subject</td>
                            <td>Message</td>
                            <td>Created_at</td>
                            <td>Updated_at</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ route('contact/reply', ['id' => $item->id]) }}"
                                        data-name="{{ $item->name }}" data-email="{{ $item->email }}"
                                        wire:click="openReplyModal({{ $item->id }})" class="btn btn-warning">
                                        Reply
                                    </a>
                                    <a href="#" wire:click="deleteContact({{ $item->id }})"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $contact->links() }}
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">contact Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyContact">
                    <div class="modal-body">
                        <h4>Do you really want to delete this contact ?</h4>
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
