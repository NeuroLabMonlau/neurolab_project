@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-blue-600 border-xl focus:border-blue-600 text-center bg-white m-auto justify-center rounded-xl ']) !!}>
