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
                    <table class="border w-full">
                        <tbody class="divide-y">
                            @foreach ($columns as $column)
                                <tr class="divide-x">
                                    <th class="text-xs text-slate-400 uppercase bg-slate-50 px-6 py-3 w-1">{{ $column }}</th>
                                    <td class="text-xs text-slate-400 px-6 py-3 w-1">
                                        @if ($resource->$column instanceof \Illuminate\Database\Eloquent\Collection)
                                            <a href="{{ $relationships[$column]['route'] }}" class="underline">collection</a>
                                        @elseif ($resource->$column instanceof \Illuminate\Database\Eloquent\Model)
                                            <a href="{{ $relationships[$column]['route'] }}" class="underline">resource</a>
                                        @else
                                            {{ gettype($resource->$column) }}
                                        @endif
                                    </td>
                                    <td class="text-base text-slate-800 px-6 py-3">
                                        @if ($resource->$column instanceof \Illuminate\Database\Eloquent\Collection)
                                            @includeFirst(['model.collections.' . $column, 'model.collections.collection'], ['data' => $resource->$column])
                                        @elseif ($resource->$column instanceof \Illuminate\Database\Eloquent\Model)
                                            @includeFirst(['model.resources.' . $column, 'model.resources.resource'], ['data' => $resource->$column])
                                        @else
                                            {{ $resource->$column }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex items-center gap-3 mt-6">
                        @foreach ($resource->actions as $action)
                            @php $action = (object) $action @endphp
                            <a href="{{ $action->route }}" class="block text-xs text-slate-400 uppercase border border-slate-200 px-12 py-3 rounded-full">{{ $action->label }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- RS --}}
    {{-- <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h4 class="text-xl font-semibold text-slate-500 px-6 py-3 bg-slate-50">Related Models</h4>
                <div class="flex flex-col divide-y divide-slate-200">
                    @foreach ($relationships as $relationship)
                        @php $relationship = (object) $relationship @endphp
                        <a href="{{ $relationship->url }}" class="inline-flex justify-between items-center px-6 py-3">
                            {{ $relationship->name }}<span>{{ $relationship->count }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
