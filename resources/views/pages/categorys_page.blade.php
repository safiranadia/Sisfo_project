@extends('layouts.index')

@section('title', 'Categorys | Sisfo')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Categorys</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                        <li class="breadcrumb-item active">Categorys</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Create Category</h4>
            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                data-bs-target="#createCategory">Create Category</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorys as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-warning waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#editCategory{{ $category->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            <span>Edit</span>
                                        </button>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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

    @include('modals.editCategory_modal')
    @include('modals.createCategory_modal')
@endsection
