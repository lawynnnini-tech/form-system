@extends('layouts.app')

@section('title', 'Event Activity Request Form')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Event Requests</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto bg-white p-4 rounded shadow">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding: 0 10px;">
    <!-- Title -->
    <div style="font-family: 'Arial', sans-serif; font-size: 30px; font-weight: 600; color: #2d1b69; border-left: 4px solid #e4ce0c; padding-left: 10px; margin-bottom: 15px;">
     Event Request Management
</div>

    <!-- Button -->
    <a href="{{ route('event-requests.create') }}"
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
            <th class="border p-2">Event Title</th>
            <th class="border p-2">Requester</th>
            <th class="border p-2">Date</th>
            <th class="border p-2">Action</th>
        </tr>
    </thead>

        <tbody>
        @foreach($data as $item)
        <tr class="hover:bg-gray-50">
            <td class="border p-2">{{ $item->id }}</td>
            <td class="border p-2">{{ $item->form_no }}</td>
            <td class="border p-2">{{ $item->event_title }}</td>
            <td class="border p-2">{{ $item->requester_name }}</td>
            <td class="border p-2">{{ $item->request_date }}</td>
            <td class="border p-2">

                    <a href="{{ route('event-requests.show', $item->id) }}"
                       class="bg-green-500 text-white px-2 py-1 rounded">
                        View
                    </a>

                    <a href="{{ route('event-requests.edit', $item->id) }}"
                       class="bg-yellow-500 text-white px-2 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('event-requests.destroy', $item->id) }}"
                          method="POST"
                          class="inline">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 text-white px-2 py-1 rounded"
                                onclick="return confirm('Delete?')">
                            Delete
                        </button>
                    </form>

    <!--add print  -->
    <a href="{{ route('event_requests.print', $item->id) }}"
    target="_blank"
    class="bg-blue-600 text-white px-2 py-1 rounded">
         Print
        </a>
    <!-- end print -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
@endsection