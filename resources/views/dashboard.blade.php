@extends('layouts.index')

@section('title', 'Dashboard | Sisfo')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Users</span>
                            <h4 class="mb-3">
                                {{ $totalUser }}
                            </h4>
                        </div>

                        <div class="col-6">
                            <div class="apex-charts mb-2" style="height: 70px"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Items</span>
                            <h4 class="mb-3">
                                {{ $totalItem }}
                            </h4>
                        </div>
                        <div class="col-6">
                            <div class="apex-charts mb-2" style="height: 70px"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Borrows</span>
                            <h4 class="mb-3">
                                {{ $totalBorrow }}
                            </h4>
                        </div>
                        <div class="col-6">
                            <div class="apex-charts mb-2" style="height: 70px"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Returns</span>
                            <h4 class="mb-3">
                                {{ $totalReturn }}
                            </h4>
                        </div>
                        <div class="col-6">
                            <div class="apex-charts mb-2" style="height: 70px"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row-->

    <div class="row">
        <div class="col-xl-6">
            <!-- card -->
            <div class="card card-h-100">
                <div class="card-header">
                    <h4 class="card-title">Data Returns</h4>
                </div>
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
                                        <td>{{ $return->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $returns->links() }}
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card card-h-100">
                <div class="card-header">
                    <h4 class="card-title">Data Items</h4>
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
                                    <th>Stock</th>
                                    <th>Condition</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->code_item }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ $item->condition }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $items->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div> <!-- end row-->

@endsection
