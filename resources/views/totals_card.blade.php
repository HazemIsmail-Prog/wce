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