@extends('layouts.index')

@section('title', 'Borrows | Sisfo')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Returns</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                        <li class="breadcrumb-item active">Returns</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Item</th>
                            <th>Return Date</th>
                            <th>Codition</th>
                            <th>Note</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($returns as $return)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $return->user->name }}</td>
                                <td>{{ $return->borrow->item->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($return->return_date)->format('d M Y') }}</td>
                                <td>{{ $return->condition }}</td>
                                <td>{{ $return->note }}</td>
                                <td>{{ $return->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
