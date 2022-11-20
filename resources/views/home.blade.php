<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($games as $game)
                        <form action="{{ route('save_estimation', $game) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="flex justify-center mb-5">
                                <div class="block rounded-lg shadow-lg bg-white max-w-sm w-full overflow-hidden ">
                                    <div
                                        class=" flex justify-between items-center bg-teal-500 p-4 text-white leading-tight font-medium">
                                        <h5>{{ $game->date_time->format('d-m-Y') }}</h5>
                                        <h5 class="text-sm">{{ $game->date_time->format('h:i a') }}</h5>
                                    </div>
                                    <div class=" p-4 bg-white">
                                        <div class=" flex ">
                                            <div class=" flex-1 flex justify-center flex-col items-center">
                                                <img src="{{ asset('images/flags/' . $game->team1->flag) }}"
                                                    alt="{{ $game->team1->flag }}" style="width: 30px;">
                                                <div class=" mt-2"><strong>{{ $game->team1->name }}</strong></div>
                                                @if ($game->date_time > now())
                                                    <x-text-input
                                                        value="{{ @$game->estimations()->where('user_id', auth()->id())->first()->team1_score }}"
                                                        id="team1_score" min="0" name="team1_score"
                                                        type="number" class="mt-2 block w-full text-center" />
                                                @endif

                                            </div>
                                            <div class=" flex-1 flex justify-center flex-col items-center border-l-2">
                                                <img src="{{ asset('images/flags/' . $game->team2->flag) }}"
                                                    alt="{{ $game->team2->flag }}" style="width: 30px;">
                                                <div class=" mt-2"><strong>{{ $game->team2->name }}</strong></div>
                                                @if ($game->date_time > now())
                                                    <x-text-input
                                                        value="{{ @$game->estimations()->where('user_id', auth()->id())->first()->team2_score }}"
                                                        id="team2_score" min="0" name="team2_score"
                                                        type="number" class="mt-2 block w-full text-center" />
                                                @endif
                                            </div>
                                        </div>
                                        @if ($game->date_time > now())
                                            <div class=" text-center my-2">
                                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                            </div>
                                        @else
                                        <hr class=" mt-6">
                                            <table class=" min-w-full">
                                                <thead class="border-b">
                                                    <th class=" text-left">User</th>
                                                    <th class=" text-right">Prediction</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($game->estimations as $row)
                                                        <tr class=" border-b">
                                                            <td class=" py-2 text-xs">{{ @$row->user->name }}</td>
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
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
