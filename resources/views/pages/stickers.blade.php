@push('scripts')
    @if (Session::has('success'))
        <script type="module">
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('success') }}',
            })
        </script>
    @endif
@endpush

<x-layout title="Stickers">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-[25px] mb-[25px]">
        @forelse ($stickers as $sticker)
            <div class="md:mb-[10px] lg:mb-[17px]">
                <a href="{{ route('stickers.show', $sticker->uuid) }}" class="block rounded-md">
                    <img src="{{ asset('images/' . $sticker->image) }}" alt="sticker-image"
                        class="object-cover w-full rounded-md aspect-square">
                </a>
                <div class="mt-[19px]">
                    <h6 class="text-lg font-normal">
                        <a href="{{ route('stickers.show', $sticker->uuid) }}"
                            class="transition-all hover:text-primary-500">
                            {{ $sticker->name }}
                        </a>
                    </h6>
                    <div class="flex items-center justify-between mt-[12px]">
                        <span class="block font-bold text-black dark:text-white text-[20px]">
                            Rp. {{ number_format($sticker->price) }}
                        </span>
                        <span class="block text-md text-gray-400 ltr:ml-[7px] rtl:mr-[7px]">
                            Rp. {{ number_format($sticker->freelance_price) }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="md:mb-[10px] lg:mb-[17px] col-span-full">
                <div class="text-center text-black rounded dark:text-white">
                    No Data Found
                </div>
            </div>
        @endforelse
    </div>
</x-layout>
