<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ImageUpload</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            border: 1px solid;
            padding: 10px;
        }

        .image-container {
            margin: 10px;
        }

        .image-container img {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Photo Gallery</h1>
    
    <h2>Add Image</h2>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            @error('image')
                <span style="color: red;">{{ $message }}</span>
            @enderror
            <label>Image</label>
            <input type="file" name='image' value="{{old('image')}}">
        </div>
        <button type="submit">Upload</button>
    </form>
    <br>

    <div class="gallery">
        @foreach ($allData as $data)
            <div class="image-container">
                <img src="{{asset('/storage/Data/'.$data->image)}}" alt="{{ $data->image }}" style="margin: 10px 10px; border: solid; border-width: thin;">
                <form action="/delete-data/{{$data->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button style="">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>