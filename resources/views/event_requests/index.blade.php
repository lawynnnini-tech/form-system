<!DOCTYPE html>
<html>
<head>
    <title>Event Requests</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto bg-white p-4 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Event Requests</h2>

        <a href="{{ route('event-requests.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + New
        </a>
    </div>

    <table class="w-full border text-center">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Title</th>
                <th class="border p-2">Requester</th>
                <th class="border p-2">Date</th>
                <th class="border p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
            <tr>
                <td class="border p-2">{{ $item->id }}</td>
                <td class="border p-2">{{ $item->event_title }}</td>
                <td class="border p-2">{{ $item->requester_name }}</td>
                <td class="border p-2">{{ $item->request_date }}</td>

                <td class="border p-2 space-x-2">

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

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>