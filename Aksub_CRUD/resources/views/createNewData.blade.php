<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Data</title>
</head>
<body>
    <h1>Create New Data</h1>
    <form action="/create" method="POST">
        @csrf
        <div class="mb-3">
            <label>Company</label>
            <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{old('company')}}">
            @error('company')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Capital</label>
            <input type="text" class="form-control @error('capital') is-invalid @enderror" name="capital" value="{{old('capital')}}">
            @error('capital')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>