@props(['label', 'id', 'name', 'required' => false])

<div class="mb-[20px] sm:mb-3">
    <label class="mb-[10px] text-black dark:text-white font-medium block" for="{{ $id }}Select">
        {{ $label }}
    </label>
    <select name="{{ $name }}" id="{{ $id }}Select" @if ($required) required @endif
        class="h-[55px] rounded-md border border-gray-200 dark:border-[#172036] bg-white dark:bg-[#0c1427] px-[13px] block w-full outline-0 cursor-pointer transition-all focus:border-primary-500">
        <option value="" selected hidden>
            Select
        </option>
        {{ $slot }}
    </select>
</div>
