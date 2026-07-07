@extends('layouts.app')

@section('title', 'Material Request Form')

@section('content')
<div class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-4 rounded shadow">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding: 0 10px;">
            <div style="font-family: 'Arial', sans-serif; font-size: 30px; font-weight: 600; color: #2d1b69; border-left: 4px solid #e4ce0c; padding-left: 10px; margin-bottom: 15px;">
                Material Request Management
            </div>

            <a href="{{ route('material-requests.create') }}"
               class="text-white px-5 py-2 rounded shadow-sm hover:shadow-md transition-all"
               style="background-color: #2d1b69; text-decoration: none; font-weight: 500;">
               + Create New
            </a>
        </div>

        <table class="w-full border-collapse border border-gray-200 text-center">
            <thead class="bg-[#4B0082] text-white">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Form No</th>
                    <th class="border p-2">Contact No/Email</th>
                    <th class="border p-2">Requester</th>
                    <th class="border p-2">Date</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($material_requests as $item)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->form_no }}</td>
                    <td class="border p-2">{{ $item->contact }}</td>
                    <td class="border p-2">{{ $item->requester_name }}</td>
                    <td class="border p-2">{{ $item->request_date }}</td>
                    <td class="border p-2">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('material-requests.edit', $item->id) }}"
                               title="Edit Request"
                               class="w-9 h-9 flex items-center justify-center rounded-lg bg-green-500 hover:bg-yellow-600 text-white shadow-sm transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-8.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 8.5-8.5z"/>
                                </svg>
                            </a>
                            

                            <form action="{{ route('material-requests.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        title="Delete Request"
                                        onclick="return confirm('Are you sure you want to delete this request?')"
                                        class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500 hover:bg-red-600 text-white shadow-sm transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10"/>
                                    </svg>
                                </button>
                            </form>

                            <a href="{{ route('material-requests.print', $item->id) }}"
                               target="_blank"
                               title="Print Request"
                               class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-600 hover:bg-blue-700 text-white shadow-sm transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2m-12 0h12v4H6v-4z"/>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
































