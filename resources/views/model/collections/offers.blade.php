<div class="px-6 py-3">
    <div class="flex items-center gap-3">
        @foreach ($data as $offer)
            <div class="text-sm text-slate-600 px-3 py-1 bg-slate-50 inline-flex items-center gap-3">
                {{ $offer->name }}
                <span class="text-xs text-slate-400">attribute: {{ $offer->attribute ?: 'none' }}</span>
            </div>
        @endforeach
    </div>
</div>
