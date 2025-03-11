<x-layout title="Account Admin">
    <div class="trezo-card bg-white dark:bg-[#0c1427] mb-[25px] p-[20px] md:p-[25px] rounded-md">
        <div class="trezo-card-content">

            <button
                class="inline-block py-[10px] px-[30px] bg-primary-500 text-white transition-all hover:bg-primary-400 rounded-md border border-primary-500 hover:border-primary-400"
                type="button" id="add-new-popup-toggle">
                Add Admin
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
                                    Admin Form
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
                        <form action="{{ route('account.admin.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="trezo-card-content pb-[20px] md:pb-[25px]">
                                <x-errors />

                                <x-form.input label="Name" id="name" name="name" :required="true" />
                                <x-form.input label="Email" id="email" name="email" type="email"
                                    :required="true" />
                                <x-form.input label="Password" id="password" name="password" type="password"
                                    :required="true" />
                                <x-form.input label="Password Confirmation" id="password_confirmation"
                                    name="password_confirmation" type="password" :required="true" />
                            </div>
                            <div
                                class="trezo-card-footer flex items-center justify-between -mx-[20px] md:-mx-[25px] px-[20px] md:px-[25px] pt-[20px] md:pt-[25px] border-t border-gray-100 dark:border-[#172036]">
                                <button
                                    class="inline-block py-[10px] px-[30px] bg-danger-500 text-white transition-all hover:bg-danger-400 rounded-md border border-danger-500 hover:border-danger-400"
                                    type="button" id="add-new-popup-toggle">
                                    Close
                                </button>
                                <button
                                    class="inline-block py-[10px] px-[30px] bg-primary-500 text-white transition-all hover:bg-primary-400 rounded-md border border-primary-500 hover:border-primary-400 ltr:mr-[11px] rtl:ml-[11px] mb-[15px]">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-3 overflow-x-auto table-responsive">
                <table class="w-full">
                    <thead class="text-black dark:text-white">
                        <tr>
                            <th
                                class="font-medium ltr:text-left rtl:text-right px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tl-md">
                                #
                            </th>
                            <th
                                class="font-medium ltr:text-left rtl:text-right px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tl-md">
                                Email
                            </th>
                            <th
                                class="font-medium ltr:text-left rtl:text-right px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tl-md">
                                Name
                            </th>
                            <th
                                class="font-medium text-left px-[20px] py-[11px] bg-gray-50 dark:bg-[#15203c] whitespace-nowrap first:rounded-tr-md">

                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-black dark:text-white">
                        @foreach ($admins as $admin)
                            <tr>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    {{ $admins->firstItem() + $loop->index }}
                                </td>

                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    {{ $admin->email }}
                                </td>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    {{ $admin->name }}
                                </td>
                                <td
                                    class="ltr:text-left rtl:text-right whitespace-nowrap px-[20px] py-[15px] border-b border-gray-100 dark:border-[#172036] ltr:first:border-l ltr:last:border-r rtl:first:border-r rtl:last:border-l">
                                    @if ($admin->email != auth()->user()->email)
                                        <div class="flex items-center gap-[9px]">
                                            <button type="button"
                                                class="leading-none text-gray-500 dark:text-gray-400 custom-tooltip"
                                                id="customTooltip" data-text="Edit">
                                                <i class="material-symbols-outlined !text-md">
                                                    edit
                                                </i>
                                            </button>
                                            <form action="{{ route('account.admin.destroy', $admin) }}" method="POST"
                                                class="inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="leading-none text-danger-500 custom-tooltip"
                                                    id="customTooltip" data-text="Delete">
                                                    <i class="material-symbols-outlined !text-md">
                                                        delete
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
                {{ $admins->links() }}
            </div>
        </div>
    </div>

    <div class="grow"></div>
</x-layout>
