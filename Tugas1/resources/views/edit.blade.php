@extends('layouts.navbar')

@section('content')
    <h1>Edit Page</h1>
    <form action="{{ route('update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $buku->title }}">
            @error('title')
                <span class="text-error block" style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" value="{{ $buku->author }}">
            @error('author')
                <span class="text-error block" style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="publicationYear">Publication Year</label>
            <input type="date" class="form-control" name="publicationYear" value="{{ $buku->publicationYear }}">
            @error('publicationYear')
                <span class="text-error block" style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="totalPage">Total Page</label>
            <input type="number" class="form-control" name="totalPage" value="{{ $buku->totalPage }}">
            @error('totalPage')
                <span class="text-error block" style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            @if (basename(asset('storage/images/'.$buku->image)) == $buku->image)
                <img src="{{ asset('storage/images/'.$buku->image) }}" style="width: 100px; height: 100px;">
              @else
                <img src="{{ $buku->image }}" style="width: 100px; height: 100px;">
              @endif
            @error('image')
                <br><span class="text-error block" style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection