@props(['label', 'type' => 'text', 'placeholder' => null, 'id', 'name', 'value' => null, 'required' => false])

<div class="mb-[20px] sm:mb-3">
    <label class="mb-[10px] text-black dark:text-white font-medium block" for="{{ $id }}Input">
        {{ $label }}
    </label>
    <input type="{{ $type }}" id="{{ $id }}Input" name="{{ $name }}" value="{{ $value }}"
        @if ($required) required @endif
        class="h-[55px] rounded-md text-black dark:text-white border border-gray-200 dark:border-[#172036] bg-white dark:bg-[#0c1427] px-[17px] block w-full outline-0 transition-all placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:border-primary-500"
        placeholder="{{ $placeholder }}">
</div>
