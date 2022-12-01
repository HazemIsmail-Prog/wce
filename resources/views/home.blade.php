<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot> --}}

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($games->sortBy('is_played') as $game)
                        <div id="game{{ $game->id }}" class="flex justify-center mb-5">
                            <div class="block rounded-lg shadow-lg bg-white max-w-sm w-full overflow-hidden ">
                                <div
                                    class="flex justify-between items-center bg-teal-600 p-2 text-white leading-tight font-medium">
                                    <h5 class="text-sm">{{ $game->date }}</h5>
                                    <h5 class="text-xs">{{ $game->time }}</h5>
                                </div>
                                <div class="p-2 bg-white">
                                    @if ($game->date_time > now()->addMinutes(15))
                                        @include('edit_form')
                                    @else
                                        @include('started_game')
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @include('totals_card')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    if(localStorage.getItem("scroll")){window.scrollTo(0,localStorage.getItem("scroll"));}
    onscroll = (event) => localStorage.setItem("scroll", document.documentElement.scrollTop);
</script>