<!DOCTYPE html>
<html>

<head>
    <title>Welcome in LAravel PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>

    <h1>{{ $category_name->name }} Items</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Model</th>

                <th>Title</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <p>No items</p>
            @else
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->model }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->short_desc }}</td>
                        <td>{{ $item->amount }}</td>

                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
