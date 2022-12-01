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
    @if ($game->date_time->format('Y-m-d') > '2022-12-02')        
        <div class="mt-2">
            <select class="mt-2 w-full text-center bg-gray-200 border-0 p-1 text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="winner_id">
                <option value="" selected disabled>-- select winner --</option>
                <option 
                    value="{{ $game->team1_id }}"
                    {{ @$game->estimations()->where('user_id', auth()->id())->first()->winner_id == $game->team1_id ? 'selected' : ''}}
                    >
                    {{ $game->team1->name }}
                </option>
                <option 
                    value="{{ $game->team2_id }}"
                    {{ @$game->estimations()->where('user_id', auth()->id())->first()->winner_id == $game->team2_id ? 'selected' : ''}}
                    >
                    {{ $game->team2->name }}
                </option>
            </select>
        </div>
    @endif
    <div class="text-right mt-2">
        <x-primary-button class="bg-teal-900 py-1 px-2">{{ __('Save') }}</x-primary-button>
    </div>
</form>