<x-layout title="Sticker Create">
    <form action="{{ route('stickers.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="trezo-card bg-white dark:bg-[#0c1427] mb-[25px] p-[20px] md:p-[25px] rounded-md">
            <div class="trezo-card-content">
                <x-errors />

                <x-form.input label="Sticker Name" id="name" name="name" />
                <x-form.input label="Price" id="price" name="price" />
                <x-form.input label="Freelance Price" id="freelancePrice" name="freelance_price" />
                <x-form.select label="Type" id="type" name="type">
                    <option value="car">Car</option>
                    <option value="motorcycle">Motorcycle</option>
                </x-form.select>
                <x-form.select label="Brand" id="brand" name="brand">
                    <option value="honda">Honda</option>
                    <option value="yamaha">Yamaha</option>
                    <option value="kawasaki">Kawasaki</option>
                    <option value="suzuki">Suzuki</option>
                </x-form.select>
                <x-form.file label="Sticker Image" id="image" name="img_file" class="sm:col-span-2" />
            </div>
        </div>
        <div class="flex justify-end mb-9">
            <div class="trezo-card-content">
                <button type="button" onclick="window.history.back()"
                    class="font-medium inline-block transition-all rounded-md md:text-md ltr:mr-[15px] rtl:ml-[15px] py-[10px] md:py-[12px] px-[20px] md:px-[22px] bg-danger-500 text-white hover:bg-danger-400">
                    Cancel
                </button>
                <button type="submit"
                    class="font-medium inline-block transition-all rounded-md md:text-md py-[10px] md:py-[12px] px-[20px] md:px-[22px] bg-primary-500 text-white hover:bg-primary-400">
                    <span class="inline-block relative ltr:pl-[29px] rtl:pr-[29px]">
                        <i class="absolute -translate-y-1/2 material-symbols-outlined ltr:left-0 rtl:right-0 top-1/2">
                            add
                        </i>
                        Add Sticker
                    </span>
                </button>
            </div>
        </div>
    </form>
</x-layout>
