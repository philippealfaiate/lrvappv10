<div class="flex items-center gap-3">
    @forelse ($data as $allergen)
        <div class="text-sm text-slate-600 px-3 py-1 bg-slate-100 rounded-full">
            {{ $allergen->code }}
        </div>
    @empty
        <span class="text-sm text-slate-400">(null)</span>
    @endforelse
</div>