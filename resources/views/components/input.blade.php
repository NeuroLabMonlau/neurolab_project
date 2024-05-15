@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' border-xl text-center bg-white m-auto justify-center rounded-xl focus:ring-0 focus:outline-none']) !!}>
