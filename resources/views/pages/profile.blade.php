<x-layout title="Profile">
    <form action="{{ route('profile.update') }}" method="post" autocomplete="off">
        @method('PUT')
        @csrf
        <div class="trezo-card bg-white dark:bg-[#0c1427] mb-[25px] p-[20px] md:p-[25px] rounded-md">
            <div class="trezo-card-content">
                <x-form.input label="Name" id="name" name="name" :value="$admin->name" />
                <x-form.input label="Email" id="email" name="email" type="email" :value="$admin->email" />
                <x-form.input label="Password" id="password" name="password" type="password" />
            </div>
        </div>
        <div class="flex justify-end mb-9">
            <div class="trezo-card-content">
                <button type="submit"
                    class="font-medium inline-block transition-all rounded-md md:text-md py-[10px] md:py-[12px] px-[20px] md:px-[22px] bg-primary-500 text-white hover:bg-primary-400">
                    <span class="inline-block relative ltr:pl-[29px] rtl:pr-[29px]">
                        <i class="absolute -translate-y-1/2 material-symbols-outlined ltr:left-0 rtl:right-0 top-1/2">
                            save
                        </i>
                        Save
                    </span>
                </button>
            </div>
        </div>
    </form>

    <div class="grow"></div>
</x-layout>
