<x-layout title="Sticker Detail">
    <div class="trezo-card bg-white dark:bg-[#0c1427] mb-[25px] p-[20px] md:p-[25px] rounded-md">
        <div class="trezo-card-content lg:max-w-[1070px] md:pt-[15px] md:px-[15px] md:pb-[75px]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[25px]">
                <div class="lg:ltr:mr-[30px] lg:rtl:ml-[30px]" id="productDetailsImageSlides">
                    <img class="w-full rounded-md" src="{{ asset('images/' . $sticker->image) }}"
                        alt="product-details-image">
                </div>
                <div>

                    <h6 class="font-medium text-lg leading-[1.5] mb-[16px]">
                        {{ $sticker->name }}
                    </h6>

                    <div class="border-t border-b border-gray-100 py-[15px] my-[19px]">
                        <h3 class="mb-0 font-medium text-black text-md dark:text-white">Sticker Price</h3>
                        <span class="block font-bold text-black dark:text-white text-[20px]">
                            Rp. {{ number_format($sticker->price) }}
                        </span>

                        <h3 class="mt-3 mb-0 font-medium text-black text-md dark:text-white">Freelance Price</h3>
                        <span class="block font-bold text-black dark:text-white text-[20px]">
                            Rp. {{ number_format($sticker->freelance_price) }}
                        </span>

                    </div>

                    <ul class="mb-[20px]">
                        <li class="mb-[6px] last:mb-0">
                            Type:
                            <span class="font-medium text-black dark:text-white">
                                {{ strtoupper($sticker->type) }}
                            </span>
                        </li>
                        <li class="mb-[6px] last:mb-0">
                            Brand:
                            <span class="font-medium text-black dark:text-white">
                                {{ strtoupper($sticker->brand) }}
                            </span>
                        </li>
                    </ul>

                    <div class="flex justify-between">
                        <button type="button"
                            onclick="document.location.href = '{{ route('stickers.edit', $sticker->uuid) }}'"
                            class="rounded-md inline-block font-medium py-[6.5px] px-[21px] text-white bg-primary-500">
                            <span class="inline-block relative ltr:pl-[24px] rtl:pr-[24px]">
                                <i
                                    class="ri-edit-fill  absolute ltr:left-0 rtl:right-0 text-[17px] top-1/2 -translate-y-1/2"></i>
                                Edit
                            </span>
                        </button>
                        <form action="{{ route('stickers.destroy', $sticker->uuid) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-md inline-block font-medium py-[6.5px] px-[21px] text-white bg-danger-500">
                                <span class="inline-block relative ltr:pl-[24px] rtl:pr-[24px]">
                                    <i
                                        class="ri-delete-bin-line  absolute ltr:left-0 rtl:right-0 text-[17px] top-1/2 -translate-y-1/2"></i>
                                    Delete
                                </span>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>
