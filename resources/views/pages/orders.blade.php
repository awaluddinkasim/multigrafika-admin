<x-layout title="Orders">
    <!-- Orders -->
    <div class="trezo-card bg-white dark:bg-[#0c1427] mb-[25px] p-[20px] md:p-[25px] rounded-md">
        <div class="trezo-card-content">

            <button
                class="inline-block py-[10px] px-[30px] bg-primary-500 text-white transition-all hover:bg-primary-400 rounded-md border border-primary-500 hover:border-primary-400"
                type="button" id="add-new-popup-toggle">
                Export PDF
            </button>

            @if (Session::has('success'))
                <div
                    class="py-[1rem] px-[1rem] text-success-500 bg-success-50 border border-success-200 rounded-md my-3">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="add-new-popup z-[999] fixed transition-all inset-0 overflow-x-hidden overflow-y-auto"
                id="add-new-popup">
                <div class="popup-dialog flex transition-all max-w-[550px] min-h-full items-center mx-auto">
                    <div class="trezo-card w-full bg-white dark:bg-[#0c1427] p-[20px] md:p-[25px] rounded-md">
                        <div
                            class="trezo-card-header bg-gray-50 dark:bg-[#15203c] mb-[20px] md:mb-[25px] flex items-center justify-between -mx-[20px] md:-mx-[25px] -mt-[20px] md:-mt-[25px] p-[20px] md:p-[25px] rounded-t-md">
                            <div class="trezo-card-title">
                                <h5 class="mb-0">
                                    Export PDF
                                </h5>
                            </div>
                            <div class="trezo-card-subtitle">
                                <button type="button"
                                    class="text-[23px] transition-all leading-none text-black dark:text-white hover:text-primary-500"
                                    id="add-new-popup-toggle">
                                    <i class="ri-close-fill"></i>
                                </button>
                            </div>
                        </div>
                        <div class="trezo-card-content pb-[20px] md:pb-[25px]">

                            <div class="mb-4 bg-white border border-gray-200 rounded-lg shadow cursor-pointer"
                                onclick="window.open('{{ route('orders.export', 'daily') }}', '_blank');">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 text-white bg-blue-500 rounded-md">
                                            <i
                                                class="relative leading-none text-gray-900 transition-all material-symbols-outlined dark:text-gray-400 -top-px">
                                                picture_as_pdf
                                            </i>
                                        </div>
                                        <div class="flex-1 w-0 ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">
                                                    Penjualan Harian
                                                </dt>
                                                <dd>
                                                    <div class="text-lg font-medium text-gray-900">
                                                        Export penjualan harian untuk bulan ini
                                                    </div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 bg-white border border-gray-200 rounded-lg shadow cursor-pointer"
                                onclick="window.open('{{ route('orders.export', 'monthly') }}', '_blank');">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 text-white bg-blue-500 rounded-md">
                                            <i
                                                class="relative leading-none text-gray-900 transition-all material-symbols-outlined dark:text-gray-400 -top-px">
                                                picture_as_pdf
                                            </i>
                                        </div>
                                        <div class="flex-1 w-0 ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">
                                                    Penjualan Bulanan
                                                </dt>
                                                <dd>
                                                    <div class="text-lg font-medium text-gray-900">
                                                        Export penjualan bulanan untuk tahun ini
                                                    </div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div
                            class="trezo-card-footer flex items-center justify-end -mx-[20px] md:-mx-[25px] px-[20px] md:px-[25px] pt-[20px] md:pt-[25px] border-t border-gray-100 dark:border-[#172036]">
                            <button
                                class="inline-block py-[10px] px-[30px] bg-danger-500 text-white transition-all hover:bg-danger-400 rounded-md border border-danger-500 hover:border-danger-400"
                                type="button" id="add-new-popup-toggle">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 overflow-x-auto table-responsive">
                @if (Session::has('success'))
                    <div
                        class="py-[1rem] px-[1rem] text-success-500 bg-success-50 border border-success-200 rounded-md mb-3">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <table class="w-full">
                    <thead class="text-black dark:text-white">
                        <tr>
                            <th
                                class="font-medium ltr:text-left rtl:text-right px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tl-md">
                                Order ID
                            </th>
                            <th
                                class="font-medium ltr:text-left rtl:text-right px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tl-md">
                                Customer
                            </th>
                            <th
                                class="font-medium ltr:text-left rtl:text-right px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tl-md">
                                Sticker
                            </th>
                            <th
                                class="font-medium ltr:text-left rtl:text-right px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tl-md">
                                Price
                            </th>
                            <th
                                class="font-medium ltr:text-left rtl:text-right px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tl-md">
                                Freelance Price
                            </th>
                            <th
                                class="font-medium text-left px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tr-md">
                                Status
                            </th>
                            <th
                                class="font-medium text-left px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tr-md">
                                Date
                            </th>
                            <th
                                class="font-medium text-left px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tr-md">

                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-black dark:text-white">
                        @foreach ($orders as $order)
                            <tr>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    {{ $order->order_id }}
                                </td>

                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    {{ $order->user->name }}
                                </td>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    {{ $order->sticker->name }}
                                </td>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    Rp. {{ number_format($order->price) }}
                                </td>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    Rp. {{ number_format($order->freelance_price) }}
                                </td>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    <x-ui.status status="{{ $order->status }}" />
                                </td>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    {{ Carbon\Carbon::parse($order->created_at)->isoFormat('DD MMMM YYYY') }}
                                </td>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    @if ($order->status == 'pending')
                                        <div class="flex items-center gap-[9px]">
                                            <form action="{{ route('orders.complete', $order->order_id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                <button class="leading-none text-primary-500 custom-tooltip"
                                                    id="customTooltip" data-text="Complete">
                                                    <i class="material-symbols-outlined !text-md">
                                                        check
                                                    </i>
                                                </button>
                                            </form>
                                            <form action="{{ route('orders.cancel', $order->order_id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                <button class="leading-none text-danger-500 custom-tooltip"
                                                    id="customTooltip" data-text="Cancel">
                                                    <i class="material-symbols-outlined !text-md">
                                                        close
                                                    </i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div
                class="px-[20px] py-[12px] md:py-[14px] rounded-b-md border-l border-r border-b border-gray-100 dark:border-[#172036] sm:flex sm:items-center justify-between">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <div class="grow"></div>
</x-layout>
