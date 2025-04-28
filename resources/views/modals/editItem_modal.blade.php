@foreach ($items as $item)
    <div class="modal fade" id="editItem{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Item: {{ $item->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="code_item{{ $item->id }}" class="form-label">Code Item</label>
                            <input type="text" class="form-control @error('code_item') is-invalid @enderror"
                                id="code_item{{ $item->id }}" name="code_item" value="{{ old('code_item', $item->code_item) }}" required>
                            @error('code_item')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name{{ $item->id }}" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name{{ $item->id }}"
                                name="name" value="{{ old('name', $item->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id{{ $item->id }}" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id{{ $item->id }}"
                                name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image{{ $item->id }}" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image{{ $item->id }}"
                                name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stock{{ $item->id }}" class="form-label">Stock</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock{{ $item->id }}"
                                name="stock" value="{{ old('stock', $item->stock) }}" required>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="condition{{ $item->id }}" class="form-label">Condition</label>
                            <select class="form-select @error('condition') is-invalid @enderror" id="condition{{ $item->id }}"
                                name="condition" required>
                                <option value="">Select Condition</option>
                                <option value="good" {{ old('condition', $item->condition) == 'good' ? 'selected' : '' }}>Good</option>
                                <option value="bad" {{ old('condition', $item->condition) == 'bad' ? 'selected' : '' }}>Bad</option>
                            </select>
                            @error('condition')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="location{{ $item->id }}" class="form-label">Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location{{ $item->id }}"
                                name="location" value="{{ old('location', $item->location) }}" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
