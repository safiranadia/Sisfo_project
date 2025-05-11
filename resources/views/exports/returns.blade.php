<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Returns</title>
</head>

<body>
    <h1>Report Returns</h1>

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
</body>

</html>
