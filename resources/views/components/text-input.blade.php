@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 border
rounded w-full p-2 focus:outline-none text-gray-900 sm:text-sm rounded-lg block w-full p-2.5']) !!}>