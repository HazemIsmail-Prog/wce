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
                    <table class=" min-w-full">
                        <thead class=" border-b">
                            <th class=" text-left p-3">Name</th>
                            <th class=" text-right p-3">Score</th>
                        </thead>
                        <tbody>
                            @foreach ($users->sortBy('estimation.score.sum') as $user)
                                <tr>
                                    <td class=" text-left p-3">{{ $user->name }}</td>
                                    <td class=" text-right p-3">{{ $user->estimations->sum('score') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
