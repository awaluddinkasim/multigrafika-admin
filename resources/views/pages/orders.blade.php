<x-layout title="Orders">
    <!-- Orders -->
    <div class="trezo-card bg-white dark:bg-[#0c1427] mb-[25px] p-[20px] md:p-[25px] rounded-md">
        <div class="trezo-card-content">
            <div class="overflow-x-auto table-responsive">
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
                                            <form action="{{ route('orders.cancel', $order->order_id) }}" method="POST"
                                                class="inline">
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
