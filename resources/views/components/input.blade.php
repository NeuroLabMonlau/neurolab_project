@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-gray-500 focus:ring-gray-500 text-center bg-black text-white m-auto justify-center rounded-tl-xl rounded-tr-[50px] rounded-bl-[50px] rounded-br-xl ']) !!}>
