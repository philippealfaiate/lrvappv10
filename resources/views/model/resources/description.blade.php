<div class="px-6 py-3">
    @if (isset($data))
        {{ $data->value }}
    @else
        <span class="text-sm text-slate-400">(null)</span>
    @endif
</div>
