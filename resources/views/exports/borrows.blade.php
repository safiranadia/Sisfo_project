<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Borrows</title>
</head>

<body>
    <h1>Report Borrows</h1>

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
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
