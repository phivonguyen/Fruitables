<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addOriginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Origins</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden"></span>
                </div>Waiting....
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="storeOrigin">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Select category</label>
                            <select required wire:model="category_id" class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Origin Name:</label>
                            <input type="text" wire:model='name' class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Origin Slug:</label>
                            <input type="text" wire:model='slug' class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Status:</label><br>
                            <input type="checkbox" wire:model='status'>
                            Ticked = Hidden
                            <br>
                            Not ticked=Visible
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click='closeModal'>Back</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- Origin Update Modal -->
<div wire:ignore.self class="modal fade" id="updateOriginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Origins:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click='closeModal'></button>
            </div>
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form wire:submit.prevent="updateOrigin">

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Select categories:</label>
                        <select required wire:model="category_id" class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Origin Name:</label>
                        <input type="text" wire:model='name' class="form-control" >
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Origin Slug:</label>
                        <input type="text" wire:model='slug' class="form-control">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label><br>
                        <input type="checkbox" wire:model='status'>
                        Ticked = Hidden
                        <br>
                        Not ticked=Visible
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click='closeModal'>Back</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Origin Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteOriginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Origin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click='closeModal'></button>
            </div>
            <form wire:submit.prevent="destroyOrigin">

                <div class="modal-body">
                    <h4>Do you really want to delete this Origin ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click='closeModal'>Back</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>
