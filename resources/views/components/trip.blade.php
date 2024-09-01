<div class="flex flex-col w-full h-52 rounded border border-gray p-4 shadow-sm justify-between">
    <div class="flex">
        <div class="flex w-full">
            <div class="flex flex-col">
                <h2 class="text-sm md:text-xl">{{ $trip->user->name }}</h2>
                <p class="text-xs md:text-sm">{{ $trip->created_at->diffForHumans() }}</p>
            </div>
            <div class="border-l border-gray h-full mx-4"></div>
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-sm md:text-xl text-dark">{{ $trip->title }}</h2>
            </div>
        </div>
        @if ($trip->user->id == auth()->id())
            <div class="flex items-center justify-end">
                <form action="{{ route('trips.destroy', $trip->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-primary text-white font-bold py-1 px-2 rounded text-sm">
                        Elimina
                    </button>
                </form>
            </div>
        @endif
    </div>
    <div class="flex flex-col justify-between">
        <div class="block">
            <x-tag>{{ $trip->vehicle }}</x-tag>
        </div>
        <div class="relative pt-1">
            <div class="flex mb-2 items-center justify-end">
                <div class="text-right text-xs font-semibold text-dark">
                    {{ max(0, min(round($trip->start_date->diffInHours(now()) / $trip->start_date->diffInHours($trip->end_date) * 100, 2), 100)) }}%
                </div>
            </div>
            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray">
                <div style="width:{{ max(0, min($trip->start_date->diffInHours(now()) / $trip->start_date->diffInHours($trip->end_date) * 100, 100)) }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-primary">{{ $trip->emoji }}</div>
            </div>
        </div>
        <div class="flex justify-between">
            <p class="text-xs md:text-sm">{{ $trip->start_location }} <br> {{ $trip->start_date->format('M d, Y') }} alle {{ $trip->start_date->format('H:i') }}</p>
            <p class="text-xs md:text-sm">{{ $trip->end_location }} <br> {{ $trip->end_date->format('M d, Y') }} alle {{ $trip->end_date->format('H:i') }}</p>
        </div>
    </div>
</div>