<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot> --}}

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Games --}}
                    @foreach ($games->sortBy('is_played') as $game)
                        <div class="flex justify-center mb-5">
                            <div class="block rounded-lg shadow-lg bg-white max-w-sm w-full overflow-hidden ">
                                <div
                                    class=" flex justify-between items-center bg-teal-600 p-4 text-white leading-tight font-medium">
                                    <h5 class=" text-sm">{{ $game->date_time->format('D,  d-m-Y') }}</h5>
                                    <h5 class="text-xs">{{ $game->date_time->format('h:i a') }}</h5>
                                </div>
                                <div class=" p-4 bg-white">
                                    <form action="{{ route('save_game_score', $game) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class=" flex ">
                                            <div class=" flex-1 flex justify-center flex-col items-center">
                                                <img src="{{ asset('images/flags/' . $game->team1->flag) }}"
                                                    alt="{{ $game->team1->flag }}" style="width: 30px;" class=" border border-teal-500 rounded-full">
                                                <div class=" mt-2"><strong>{{ $game->team1->name }}</strong></div>
                                                <x-text-input
                                                    value="{{ $game->team1_score }}"
                                                    id="team1_score" min="0" name="team1_score"
                                                    type="number" class="mt-2 text-center w-20 bg-gray-200 border-0 p-1 mx-2 text-sm" />

                                            </div>
                                            <div
                                                class=" flex-1 flex justify-center flex-col items-center border-l-2">
                                                <img src="{{ asset('images/flags/' . $game->team2->flag) }}"
                                                    alt="{{ $game->team2->flag }}" style="width: 30px;" class=" border border-teal-500 rounded-full">
                                                <div class=" mt-2"><strong>{{ $game->team2->name }}</strong></div>
                                                <x-text-input
                                                    value="{{ $game->team2_score }}"
                                                    id="team2_score" min="0" name="team2_score"
                                                    type="number" class="mt-2 text-center w-20 bg-gray-200 border-0 p-1 mx-2 text-sm" />
                                            </div>
                                        </div>
                                        <div class=" text-right mt-2">
                                            <x-primary-button class=" bg-teal-900 py-1 px-2">{{ __('Save') }}</x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
