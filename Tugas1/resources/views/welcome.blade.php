@extends('layouts.navbar')

@section('content')
    <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                @error('title')
                    <span class="text-error block" style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" value="{{ old('author') }}">
                @error('author')
                    <span class="text-error block" style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="publicationYear">Publication Year</label>
                <input type="date" class="form-control" name="publicationYear" value="{{ old('publicationYear') }}">
                @error('publicationYear')
                    <span class="text-error block" style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="totalPage">Total Page</label>
                <input type="number" class="form-control" name="totalPage" value="{{ old('totalPage') }}">
                @error('totalPage')
                    <span class="text-error block" style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image">
                @error('image')
                    <span class="text-error block" style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection