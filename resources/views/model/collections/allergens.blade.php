<div class="px-6 py-3">
    <div class="flex items-center gap-3 flex-wrap">
        @forelse ($data as $allergen)
            <div class="text-sm text-slate-600 px-3 py-1 bg-slate-100 rounded-full whitespace-nowrap">
                {{ config('mkd.allergens')[$allergen->code] }}
            </div>
        @empty
            <span class="text-sm text-slate-400">(null)</span>
        @endforelse
    </div>
</div>