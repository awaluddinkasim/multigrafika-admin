@props(['label', 'placeholder' => null, 'id', 'name'])

<div class="mb-[20px] sm:mb-3">
    <label class="mb-[10px] text-black dark:text-white font-medium block" for="{{ $id }}Input">
        {{ $label }}
    </label>
    <div id="fileUploader">
        <div
            class="relative flex items-center justify-center overflow-hidden rounded-md py-[88px] px-[20px] border border-gray-200 dark:border-[#172036]">
            <div class="flex items-center justify-center">
                <div
                    class="w-[35px] h-[35px] border border-gray-100 dark:border-[#15203c] flex items-center justify-center rounded-md text-primary-500 text-lg ltr:mr-[12px] rtl:ml-[12px]">
                    <i class="ri-upload-2-line"></i>
                </div>
                <p class="leading-[1.5]">
                    <strong class="text-black dark:text-white">Click to upload</strong><br> you file
                    here
                </p>
            </div>
            <input type="file" id="fileInput" multiple="" name="{{ $name }}" id="{{ $id }}Input"
                class="absolute top-0 left-0 right-0 bottom-0 rounded-md z-[1] opacity-0 cursor-pointer">
        </div>
        <ul id="fileList">

        </ul>
    </div>
</div>
