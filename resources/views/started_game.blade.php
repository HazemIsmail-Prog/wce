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
                <div class=" flex flex-col">
                    <div>{{ @$game->team1_score }} : {{ @$game->team2_score }}</div>
                    @if ($game->team1_p_score && $game->team2_p_score)
                        <div>{{ $game->team1_p_score }} : {{ $game->team2_p_score }}</div>
                    @endif
                </div>
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
                <div class=" flex items-center ">
                    <div>
                        {{ @$row->user->name }}
                    </div>
                    @if ($row->winner_id)
                    <div class="ml-2">
                        <img src="{{ asset('images/flags/' . $row->winner->flag) }}"
                            alt="{{ $row->winner->flag }}"
                            style="width: 10px; height:10px" class="border border-teal-500 rounded-full">
                    </div>
                    @endif
                </div>
            </td>
            <td width="50%">
                @if ($row->score > 0)
                <div class="flex">
                    <span
                        class="inline-block py-0.5 px-2 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded-full" style="font-size: 9px">{{ $row->score }}</span>
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