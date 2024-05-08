@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-red-400 border-xl focus:border-red-400 text-center bg-white m-auto justify-center rounded-xl focus:ring-0 focus:outline-none']) !!}>
