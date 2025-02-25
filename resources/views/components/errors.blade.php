@foreach ($errors->all() as $error)
    <div class="py-[1rem] px-[1rem] text-danger-500 bg-danger-50 border border-danger-200 rounded-md mb-3">
        {{ $error }}
    </div>
@endforeach
