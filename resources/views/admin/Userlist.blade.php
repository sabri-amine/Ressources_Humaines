

@extends('layouts.app')
 
@section('title', 'MyOcp')
 
@section('content')
<div>
    <h1 class="font-bold text-2xl ml-3">List Employés</h1>
    <div class="mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nationality ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap" style="font-weight:500;">{{ $user->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap" style="font-weight:500;">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap" style="font-weight:500;">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap" style="font-weight:500;">{{ $user->national_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap" style="font-weight:500;">{{ $user->service }}</td>
                    <td class="px-6 py-4 whitespace-nowrap" style="font-weight:500;"><img src="{{ asset('uploads/' . $user->image) }}" alt="{{ $user->name }}" class="h-8 w-8 rounded-full"></td>
                    <td class="px-6 py-4 whitespace-nowrap" style="display: flex"><a  class="btn btn-primary" href="{{ route('profiles.show',$user->id )}}" role="button"><i class="bi bi-eye-fill"></i> </a>
                        <form action="{{ route('admin.delete', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-4"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
@endsection
