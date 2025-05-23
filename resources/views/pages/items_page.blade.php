@extends('layouts.index')

@section('title', 'Items | Sisfo')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Items</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                        <li class="breadcrumb-item active">Items</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Create Item</h4>
            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                data-bs-target="#createItem">Create Item</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code Item</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Stock</th>
                            <th>Condition</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->code_item }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('storage/img/' . $item->image) }}" alt="{{ $item->name }}"
                                            width="50" height="50">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>{{ $item->stock }}</td>
                                <td>{{ $item->condition }}</td>
                                <td>{{ $item->location }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-warning waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#editItem{{ $item->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            <span>Edit</span>
                                        </button>
                                        <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger waves-effect waves-light">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end card body -->
    </div>

    @include('modals.editItem_modal')
    @include('modals.createItem_modal')
@endsection
