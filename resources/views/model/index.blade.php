<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ $page_title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border table-auto divide-y w-full">
                        <thead>
                            <tr class="divide-x">
                                @foreach ($columns as $column)
                                    <th class="text-xs text-slate-400 uppercase bg-slate-50 px-6 py-3 min-w-fit">{{ $column }}</th>
                                @endforeach
                                    <th class="bg-slate-50 px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse ($collection as $resource)
                                <tr class="divide-x">
                                    @foreach ($columns as $column)
                                        <td class="text-base text-slate-800 px-6 py-3 min-w-fit">
                                            {{ $resource->$column }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-3">
                                        <div class="flex items-center justify-end gap-3">
                                            @foreach ($resource->actions as $action)
                                                @php $action = (object) $action @endphp
                                                <a href="{{ $action->route }}" class="text-xs text-slate-500 uppercase hover:underline">{{ $action->label }}</a>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-base text-slate-800 px-6 py-3" colspan="{{ count($columns) + 1 }}"></td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
