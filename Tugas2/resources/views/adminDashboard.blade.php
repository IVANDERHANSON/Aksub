<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Hello Admin ").Cookie::get('name').'!' }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Publication Year</th>
                            <th scope="col">Total Page</th>
                            <th scope="col">Image</th>
                          </tr>
                        </thead>
                        <tbody>
                    
                          @php
                              $i = 1;
                          @endphp
                          @forelse ($bukus as $buku)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $buku->title }}</td>
                                <td>{{ $buku->author }}</td>
                                <td>{{ $buku->publicationYear }}</td>
                                <td>{{ $buku->totalPage }}</td>
                                <td>
                                  @if (basename(asset('storage/images/'.$buku->image)) == $buku->image)
                                    <img src="{{ asset('storage/images/'.$buku->image) }}" style="width: 100px; height: 100px;">
                                  @else
                                    <img src="{{ $buku->image }}" style="width: 100px; height: 100px;">
                                  @endif
                                </td>
                                <td><a href="{{ route('download', $buku->id) }}"><button type="button" class="btn btn-success">Download</button></a></td>
                                <td><a href="{{ route('edit', $buku->id) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                                <form action="{{ route('delete', $buku->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td><button type="submit" class="btn btn-danger">Delete</button></td>
                                </form>
                            </tr>
                          @empty
                              <h1>Empty</h1>
                          @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
