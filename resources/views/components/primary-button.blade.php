<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 border border-transparent rounded-md font-semibold text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
@props(['type' => 'submit'])