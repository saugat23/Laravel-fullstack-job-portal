<label for="{{ $for }}" class="mb-4 font-medium text-slate-900 block text-sm">
    {{ $slot }} @if ($required)
        <span>*</span>
    @endif
</label>