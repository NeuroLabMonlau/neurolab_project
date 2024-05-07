@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-red-300 focus:border-red-300 focus:ring-red-300 text-center bg-white m-auto justify-center rounded-xl ']) !!}>
