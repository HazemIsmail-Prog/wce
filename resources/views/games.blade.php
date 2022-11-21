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
                    <table class=" min-w-full">
                        <thead>
                            <th class=" text-left">Team1</th>
                            <th>Score1</th>
                            <th></th>
                            <th>Score2</th>
                            <th class=" text-right">Team2</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($games as $game)
                                <form action="{{ route('save_game_score', $game) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <tr>
                                        <td>
                                            <div class=" flex justify-start items-center">
                                                <img src="{{ asset('images/flags/' . $game->team1->flag) }}"
                                                    alt="{{ $game->team1->flag }}" style="width: 30px;">
                                                <div class=" ml-2">{{ $game->team1->name }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <x-text-input value="{{ $game->team1_score }}" id="team1_score"
                                                min="0" name="team1_score" type="number"
                                                class="mt-2 block w-full text-center" />
                                        </td>
                                        <td> : </td>
                                        <td>
                                            <x-text-input value="{{ $game->team2_score }}" id="team1_score"
                                                min="0" name="team2_score" type="number"
                                                class="mt-2 block w-full text-center" />
                                        </td>
                                        <td>
                                            <div class="flex justify-end items-center">
                                                <div class=" mr-2">{{ $game->team2->name }}</div>
                                                <img src="{{ asset('images/flags/' . $game->team2->flag) }}"
                                                    alt="{{ $game->team1->flag }}" style="width: 30px;">
                                            </div>
                                        </td>
                                        <td>
                                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
