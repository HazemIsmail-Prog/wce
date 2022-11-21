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
                    @foreach ($games->sortBy('is_played') as $game)
                        <div class="flex justify-center mb-5">
                            <div class="block rounded-lg shadow-lg bg-white max-w-sm w-full overflow-hidden ">
                                <div
                                    class=" flex justify-between items-center bg-teal-500 p-4 text-white leading-tight font-medium">
                                    <h5>{{ $game->date_time->format('d-m-Y') }}</h5>
                                    <h5 class="text-sm">{{ $game->date_time->format('h:i a') }}</h5>
                                </div>
                                <div class=" p-4 bg-white">
                                    @if ($game->date_time > now()->addMinutes(15))
                                        <form action="{{ route('save_estimation', $game) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class=" flex ">
                                                <div class=" flex-1 flex justify-center flex-col items-center">
                                                    <img src="{{ asset('images/flags/' . $game->team1->flag) }}"
                                                        alt="{{ $game->team1->flag }}" style="width: 30px;">
                                                    <div class=" mt-2"><strong>{{ $game->team1->name }}</strong></div>
                                                    <x-text-input
                                                        value="{{ @$game->estimations()->where('user_id', auth()->id())->first()->team1_score }}"
                                                        id="team1_score" min="0" name="team1_score"
                                                        type="number" class="mt-2 block w-full text-center" />

                                                </div>
                                                <div
                                                    class=" flex-1 flex justify-center flex-col items-center border-l-2">
                                                    <img src="{{ asset('images/flags/' . $game->team2->flag) }}"
                                                        alt="{{ $game->team2->flag }}" style="width: 30px;">
                                                    <div class=" mt-2"><strong>{{ $game->team2->name }}</strong></div>
                                                    <x-text-input
                                                        value="{{ @$game->estimations()->where('user_id', auth()->id())->first()->team2_score }}"
                                                        id="team2_score" min="0" name="team2_score"
                                                        type="number" class="mt-2 block w-full text-center" />
                                                </div>
                                            </div>
                                            <div class=" text-center my-2">
                                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                            </div>
                                        </form>
                                    @else
                                        <table class=" min-w-full">
                                            <tr class=" border-b">
                                                <td class=" py-2 text-sm"><strong>Final Result</strong></td>
                                                <td class=" flex justify-between py-2 items-center">
                                                    <img src="{{ asset('images/flags/' . $game->team1->flag) }}"
                                                        alt="{{ $game->team1->flag }}"
                                                        style="width: 15px; height:15px">

                                                    <strong class=" text-sm">
                                                        {{ @$game->team1_score }}
                                                        :
                                                        {{ @$game->team2_score }}
                                                    </strong>
                                                    <img src="{{ asset('images/flags/' . $game->team2->flag) }}"
                                                        alt="{{ $game->team2->flag }}"
                                                        style="width: 15px; height:15px">

                                                </td>
                                            </tr>
                                            @foreach ($game->estimations as $row)
                                                <tr>
                                                    <td class=" py-2 text-xs">
                                                        {{ @$row->user->name }}
                                                        @if ($row->score > 0)
                                                            <span
                                                                class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded-full">{{ $row->score }}</span>
                                                        @endif
                                                    </td>
                                                    <td class=" flex justify-between py-2 items-center">
                                                        <img src="{{ asset('images/flags/' . $game->team1->flag) }}"
                                                            alt="{{ $game->team1->flag }}"
                                                            style="width: 15px; height:15px">

                                                        <span class=" text-xs">
                                                            {{ @$row->team1_score }}
                                                            :
                                                            {{ @$row->team2_score }}
                                                        </span>
                                                        <img src="{{ asset('images/flags/' . $game->team2->flag) }}"
                                                            alt="{{ $game->team2->flag }}"
                                                            style="width: 15px; height:15px">

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
