<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <style>
        table, th, td {
            border: 1px solid;
        }
    </style>
</head>
<body>
    <a href="/create-new-data">Create New Data</a>
    <table>
        <tr>
            <th>#</th>
            <th>Company</th>
            <th>Capital</th>
            <th>Action</th>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($allData as $data)
        <tr>
            <th>
                @php
                    echo $i;
                    $i++;
                @endphp
            </th>
            <th>{{ $data->company }}</th>
            <th>{{ $data->capital }}</th>
            <th style="display: flex; flex-direction: row;">
                <a href="{{route('edit', $data->id)}}">Edit</a>
                <form action="/delete-data/{{$data->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button>Delete</button>
                </form>
            </th>
        </tr>
        @endforeach
    </table>
</body>
</html>