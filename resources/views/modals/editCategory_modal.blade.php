@foreach ($categorys as $category)
    <div class="modal fade" id="editCategory{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Category: {{ $category->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name{{ $category->id }}" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name{{ $category->id }}" name="name"
                                value="{{ $category->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description{{ $category->id }}" class="form-label">Description</label>
                            <textarea class="form-control" id="description{{ $category->id }}" name="description" rows="3">{{ $category->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
