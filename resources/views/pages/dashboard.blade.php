<x-layout title="Dashboard">
    <div class="trezo-card bg-primary-500 mb-[25px] p-[20px] md:p-[25px] rounded-md">
        <div class="trezo-card-content relative ltr:md:pr-[230px] rtl:md:pl-[230px]">
            <div class="md:pt-[5px] md:pb-[5px]">
                <h5 class="mb-[5px] md:mb-[2px] font-semibold text-white">
                    Halo, <span class="text-[#ffcea9]">{{ auth()->user()->name }}!</span>
                </h5>
                <p class="text-[#d5d9e2]">
                    Welcome to your dashboard
                </p>
                <div class="border-t border-primary-400 mt-[15px] mb-[15px] md:mt-[30px] md:mb-[33px]"></div>
                <div class="items-center sm:flex">
                    <div class="flex items-center ltr:sm:mr-[20px] ltr:2xl:mr-[40px] rtl:sm:ml-[20px] rtl:2xl:ml-[40px]">
                        <div
                            class="w-[42px] h-[42px] rtl:ml-[12px] ltr:mr-[12px] bg-primary-50 text-warning-500 rounded-md flex items-center justify-center">
                            <i class="material-symbols-outlined">
                                receipt
                            </i>
                        </div>
                        <div>
                            <span class="text-[15px] md:text-md text-white block font-semibold mb-[1px] md:mb-0">
                                {{ number_format($stickers) }}
                            </span>
                            <span class="block text-gray-200">
                                Stickers
                            </span>
                        </div>
                    </div>
                    <div
                        class="flex items-center ltr:sm:mr-[20px] ltr:2xl:mr-[40px] rtl:sm:ml-[20px] rtl:2xl:ml-[40px]">
                        <div
                            class="w-[42px] h-[42px] rtl:ml-[12px] ltr:mr-[12px] bg-primary-50 text-primary-500 rounded-md flex items-center justify-center">
                            <i class="material-symbols-outlined">
                                shopping_bag
                            </i>
                        </div>
                        <div>
                            <span class="text-[15px] md:text-md text-white block font-semibold mb-[1px] md:mb-0">
                                {{ number_format($orders) }}
                            </span>
                            <span class="block text-gray-200">
                                Orders
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center mt-[15px] sm:mt-0">
                        <div
                            class="w-[42px] h-[42px] rtl:ml-[12px] ltr:mr-[12px] bg-danger-50 text-success-500 rounded-md flex items-center justify-center">
                            <i class="material-symbols-outlined">
                                person
                            </i>
                        </div>
                        <div>
                            <span class="text-[15px] md:text-md text-white block font-semibold mb-[1px] md:mb-0">
                                {{ number_format($users) }}
                            </span>
                            <span class="block text-gray-200">
                                Customers
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="text-center md:absolute ltr:right-0 rtl:left-0 md:max-w-[208.04px] md:top-1/2 md:-translate-y-1/2 mt-[20px] md:mt-0">
                <img src="assets/images/welcome.png" class="inline-block" alt="welcome-image">
            </div>
        </div>
    </div>
</x-layout>
