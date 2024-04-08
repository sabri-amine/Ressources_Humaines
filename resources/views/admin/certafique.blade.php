@extends('layouts.app')
@section('content')
<h1>liste certificates</h1>
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type demande</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($users as $user)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap" style="font-weight:500;">{{ $user->id }}</td>
            <td class="px-6 py-4 whitespace-nowrap" style="font-weight:500;">{{ $user->date_reservation }}</td>
            <td class="px-6 py-4 whitespace-nowrap" style="font-weight:500;">{{ $user->demande }}</td>
            <td class="px-6 py-4 whitespace-nowrap" style="font-weight:bold;color: {{ $user->validation == 'valid' ? 'green' : 'red' }};">
                {{ $user->validation }}
            </td>            
            <td class="px-6 py-4 whitespace-nowrap" style="display: flex">
                <form action="/valid" method="post">
                    @csrf
                    <input class="form-control" type="hidden" name="valid" value="valid">
                    <button type="submit" name="id" value="{{ $user->id }}" class="btn" style="background-color: {{ $user->validation == 'valid' ? 'green' : 'red' }}; color: white;">
                        @if($user->validation == 'valid')
                            <i class="bi bi-check-circle-fill"></i> <!-- Icône de validation -->
                        @else
                            <i class="bi bi-x-circle-fill"></i> <!-- Icône d'invalidation -->
                        @endif
                    </button>
                </form>
                
                
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection