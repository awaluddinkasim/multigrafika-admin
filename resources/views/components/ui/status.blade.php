@props(['status'])

@php
    $color = '';
    switch ($status) {
        case 'pending':
            $color = 'bg-warning-100 text-warning-600';
            break;

        case 'completed':
            $color = 'bg-success-100 text-success-600';
            break;

        case 'cancelled':
            $color = 'bg-danger-100 text-danger-600';
            break;

        default:
            $color = 'bg-gray-100 text-gray-600';
    }
@endphp

<span class="px-[8px] py-[3px] inline-block dark:bg-[#15203c] rounded-sm font-medium text-xs {{ $color }}">
    {{ $status }}
</span>
