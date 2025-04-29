@extends('layouts.index')

@section('title', 'Borrows | Sisfo')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Borrow Requests</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                        <li class="breadcrumb-item active">Borrow Requests</li>
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
                            <th>Class</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Borrow date</th>
                            <th>Purposes</th>
                            <th>Status Borrow</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrows as $borrow)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $borrow->user->name }}</td>
                                <td>{{ $borrow->user->class }}</td>
                                <td>{{ $borrow->item->name }}</td>
                                <td>{{ $borrow->quantity }}</td>
                                <td>{{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d M Y') }}</td>
                                <td>{{ Str::limit($borrow->purposes, 30) }}</td>
                                <td>{{ $borrow->status }}</td>
                                <td>
                                    @if ($borrow->is_approved)
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!$borrow->is_approved)
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('borrows.approve', $borrow->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-muted">Approved</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
