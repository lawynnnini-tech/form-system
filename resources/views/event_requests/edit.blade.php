<!DOCTYPE html>
<html>
<head>
    <title>Event Request Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6">

    <h1 class="text-2xl font-bold text-center mb-6">
        EVENT ACTIVITY REQUEST FORM
    </h1>

    <form action="{{ route('event-requests.store') }}" method="POST">
        @csrf

        {{-- SECTION A --}}
        <h2 class="bg-blue-600 text-white p-2 font-bold">SECTION A - REQUESTER INFORMATION</h2>

        <div class="grid grid-cols-2 gap-4 p-4">
            <input name="requester_name" placeholder="Requester Name" class="border p-2 rounded">
            <input name="department" placeholder="Department" class="border p-2 rounded">
            <input name="contact" placeholder="Contact" class="border p-2 rounded">
            <input type="date" name="request_date" class="border p-2 rounded">
        </div>

        {{-- SECTION B --}}
        <h2 class="bg-blue-600 text-white p-2 font-bold">SECTION B - EVENT DETAILS</h2>

        <div class="grid grid-cols-2 gap-4 p-4">
            <input name="event_title" placeholder="Event Title" class="border p-2 rounded">

            <select name="event_type" class="border p-2 rounded">
                <option>Academic</option>
                <option>Sports</option>
                <option>Cultural</option>
                <option>Marketing</option>
                <option>Meeting</option>
            </select>

            <input type="date" name="proposed_date" class="border p-2 rounded">
            <input type="time" name="start_time" class="border p-2 rounded">
            <input type="time" name="end_time" class="border p-2 rounded">
            <input name="venue" placeholder="Venue" class="border p-2 rounded">

            <input type="number" name="participants" placeholder="Participants" class="border p-2 rounded">

            <input name="target_audience" placeholder="Target Audience" class="border p-2 rounded">
        </div>

        {{-- SECTION C --}}
        <h2 class="bg-blue-600 text-white p-2 font-bold">SECTION C - PURPOSE</h2>

        <div class="p-4">
            <textarea name="purpose" class="w-full border p-2 rounded" rows="4"></textarea>
        </div>

        {{-- SECTION D (FIXED TABLE) --}}
        <h2 class="bg-blue-600 text-white p-2 font-bold">SECTION D - RESOURCES</h2>

        <div class="p-4">
            <table class="w-full border text-center">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border p-2">Item</th>
                        <th class="border p-2">Qty</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="border p-2">Tables</td>
                        <td class="border p-2">
                            <input type="number" name="tables_qty" class="w-full text-center">
                        </td>
                    </tr>

                    <tr>
                        <td class="border p-2">Chairs</td>
                        <td class="border p-2">
                            <input type="number" name="chairs_qty" class="w-full text-center">
                        </td>
                    </tr>

                    <tr>
                        <td class="border p-2">Projector</td>
                        <td class="border p-2">
                            <input type="number" name="projector_qty" class="w-full text-center">
                        </td>
                    </tr>

                    <tr>
                        <td class="border p-2">Microphone</td>
                        <td class="border p-2">
                            <input type="number" name="microphone_qty" class="w-full text-center">
                        </td>
                    </tr>

                    <tr>
                        <td class="border p-2">Speaker</td>
                        <td class="border p-2">
                            <input type="number" name="speaker_qty" class="w-full text-center">
                        </td>
                    </tr>

                    <tr>
                        <td class="border p-2">Banner</td>
                        <td class="border p-2">
                            <input type="number" name="banner_qty" class="w-full text-center">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- SECTION E --}}
        <h2 class="bg-blue-600 text-white p-2 font-bold">SECTION E - LOGISTICS</h2>

        <div class="p-4 grid grid-cols-2 gap-2">
            <label><input type="checkbox" name="logistics[]" value="sound"> Sound System</label>
            <label><input type="checkbox" name="logistics[]" value="chairs"> Tables & Chairs</label>
            <label><input type="checkbox" name="logistics[]" value="projector"> Projector</label>
            <label><input type="checkbox" name="logistics[]" value="decoration"> Decoration</label>
            <label><input type="checkbox" name="logistics[]" value="refreshment"> Refreshment</label>
            <label><input type="checkbox" name="logistics[]" value="security"> Security</label>
        </div>

        {{-- SECTION F --}}
        <h2 class="bg-blue-600 text-white p-2 font-bold">SECTION F - OFFICE USE</h2>

        <div class="p-4">
            <textarea name="remarks" placeholder="Remarks" class="w-full border p-2 rounded"></textarea>
        </div>

        {{-- BUTTONS --}}
        <div class="flex justify-between p-4">
            <a href="{{ route('event-requests.index') }}"
               class="bg-gray-400 text-white px-4 py-2 rounded">
                Cancel
            </a>

            <button class="bg-blue-600 text-white px-6 py-2 rounded">
                Update
            </button>
        </div>

    </form>
</div>

</body>
</html>