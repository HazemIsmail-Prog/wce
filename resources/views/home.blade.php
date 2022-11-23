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

                    {{-- Games --}}
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
                                        <form action="{{ route('save_estimation', $game) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="flex ">
                                                <div class="flex-1 flex justify-center flex-col items-center">
                                                    <img src="{{ asset('images/flags/' . $game->team1->flag) }}"
                                                        alt="{{ $game->team1->flag }}" style="width: 30px;" class="border border-teal-500 rounded-full">
                                                    <div class="mt-2"><strong>{{ $game->team1->name }}</strong></div>
                                                    <x-text-input
                                                        value="{{ @$game->estimations()->where('user_id', auth()->id())->first()->team1_score }}"
                                                        id="team1_score" min="0" name="team1_score"
                                                        type="number" class="mt-2 text-center w-20 bg-gray-200 border-0 p-1 mx-2 text-sm" />
                                                </div>
                                                <div
                                                    class="flex-1 flex justify-center flex-col items-center border-l-2">
                                                    <img src="{{ asset('images/flags/' . $game->team2->flag) }}"
                                                        alt="{{ $game->team2->flag }}" style="width: 30px;" class="border border-teal-500 rounded-full">
                                                    <div class="mt-2"><strong>{{ $game->team2->name }}</strong></div>
                                                    <x-text-input
                                                        value="{{ @$game->estimations()->where('user_id', auth()->id())->first()->team2_score }}"
                                                        id="team2_score" min="0" name="team2_score"
                                                        type="number" class="mt-2 text-center w-20 bg-gray-200 border-0 p-1 mx-2 text-sm" />
                                                </div>
                                            </div>
                                            <div class="text-right mt-2">
                                                <x-primary-button class="bg-teal-900 py-1 px-2">{{ __('Save') }}</x-primary-button>
                                            </div>
                                        </form>
                                    @else
                                        <table class="min-w-full">
                                            <tr class="border-b">
                                                <td colspan="3" class="p-1 text-xs font-bold">
                                                    <div class="flex justify-evenly">
                                                        <div>{{ $game->team1->name }}</div>
                                                        <div>
                                                            <img src="{{ asset('images/flags/' . $game->team1->flag) }}"
                                                                alt="{{ $game->team1->flag }}"
                                                                style="width: 15px; height:15px" class="border border-teal-500 rounded-full">
                                                        </div>
                                                        @if ($game->is_played)
                                                            <div>{{ @$game->team1_score }} : {{ @$game->team2_score }}</div>
                                                        @endif
                                                        <div>   
                                                            <img src="{{ asset('images/flags/' . $game->team2->flag) }}"
                                                            alt="{{ $game->team2->flag }}"
                                                            style="width: 15px; height:15px" class="border border-teal-500 rounded-full">
                                                        </div>
                                                        <div>{{ $game->team2->name }}</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @foreach ($game->estimations as $row)
                                                <tr class="{{ $row->user_id == auth()->id() ? 'bg-gray-100 font-bold' : '' }}">
                                                    <td class="p-1 text-xs">
                                                        {{ @$row->user->name }}
                                                    </td>
                                                    <td>
                                                        @if ($row->score > 0)
                                                        <div class="flex">
                                                            <span
                                                                class="inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded-full" style="font-size: 10px">{{ $row->score }}</span>
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td class="flex justify-between p-1 items-center">
                                                        <img src="{{ asset('images/flags/' . $game->team1->flag) }}"
                                                            alt="{{ $game->team1->flag }}"
                                                            style="width: 15px; height:15px" class="border border-teal-500 rounded-full">
                                                        <span class="text-xs">
                                                            {{ @$row->team1_score }}
                                                            :
                                                            {{ @$row->team2_score }}
                                                        </span>
                                                        <img src="{{ asset('images/flags/' . $game->team2->flag) }}"
                                                            alt="{{ $game->team2->flag }}"
                                                            style="width: 15px; height:15px" class="border border-teal-500 rounded-full">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- Totals --}}
                    <div class="flex justify-center mb-5">
                        <div class="block rounded-lg shadow-lg bg-white max-w-sm w-full overflow-hidden ">
                            <div
                                class="flex justify-between items-center bg-teal-600 p-2 text-white leading-tight font-medium">
                                <h5 class="text-sm">Total</h5>
                            </div>
                            <div class="p-2 bg-white">
                                <table class="min-w-full">
                                    @foreach ($users->sortByDesc('score') as $user)
                                        <tr class="{{ $user->id == auth()->id() ? 'bg-gray-100 font-bold' : '' }}">
                                            <td class="p-1 text-xs">{{ $user->name }}</td>
                                            <td class="p-1 text-right flex justify-end items-center">
                                                <span 
                                                    class="inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded-full" 
                                                    style="font-size: 10px">
                                                        {{ $user->score }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    if(localStorage.getItem("scroll")){window.scrollTo(0,localStorage.getItem("scroll"));}
    onscroll = (event) => localStorage.setItem("scroll", document.documentElement.scrollTop);
</script>