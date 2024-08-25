<x-app-layout>
    <div class="flex bg-light">
        <div class="sidebar w-1/6 h-screen flex flex-col gap-4 p-4">
            <div class="flex">
                <h1 class="text-2xl">{{ auth()->user()->name }}</h1>
                <button class="ml-auto bg-primary text-white p-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
            </div>
            <hr class="border-gray">
        </div>
        <div class="content w-5/6 h-screen bg-secondary flex flex-col gap-2 p-4 bg-white rounded-xl overflow-scroll">
            <form action="/search" method="get">
                <x-text-input name="search" label="Cerca" type="text"/>
            </form>
            @foreach ($trips as $trip)
                <x-trip :trip="$trip" />
            @endforeach
        </div>
    </div>
    <div id="createTripModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center bg-gray">
        <div class="modal-content bg-white w-1/2 p-4 rounded-xl shadow-sm">
            <h2 class="text-2xl mb-4">Nuovo viaggio</h2>
            <form action="/trips" method="post">
                @csrf
                <div class="mb-4">
                    <x-text-input name="title" label="Titolo" type="text" required/>
                </div>
                <div class="flex mb-4 justify-between">
                    <x-text-input name="vehicle" label="Veicolo" type="text" required/>
                    <x-text-input name="start_location" label="Partenza" type="text" required/>
                    <x-text-input name="end_location" label="Arrivo" type="text" required/> 
                </div>
                <div class="flex mb-4 justify-between items-center">
                    <x-text-input name="emoji" label="Emoji" type="text" required/>
                    <x-text-input name="start_date" label="Data partenza" type="datetime-local" required />
                    <x-text-input name="end_date" label="Data arrivo" type="datetime-local" required />
                </div>
                <div class="flex items-baseline justify-end">
                    <button type="submit" class="inline-block mt-1 text-sm bg-primary text-white px-4 py-2 rounded">Create</button>
                    <button type="button" class="inline-block mt-1 text-sm border border-gray text-dark px-4 py-2 rounded ml-4">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    document.querySelector('button').addEventListener('click', () => {
        // Open modal to create a new trip
        document.getElementById('createTripModal').classList.remove('hidden');
    });

    document.querySelector('.modal').addEventListener('click', (e) => {
        // Close modal when clicking outside of it
        if (e.target.classList.contains('modal')) {
            document.getElementById('createTripModal').classList.add('hidden');
        }
    });

    document.querySelector('.modal button[type="button"]').addEventListener('click', () => {
        // Close modal when clicking on cancel button and reset form
        document.querySelector('.modal form').reset();
        document.getElementById('createTripModal').classList.add('hidden');
    });
</script>