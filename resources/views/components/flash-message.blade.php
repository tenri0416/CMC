@props(['status' => 'info'])

@php

    if (session('status') === 'info') {
        $bgColor = 'bg-blue-300';
    }
    if (session('status') == 'alert') {
        $bgColor = 'bg-red-500';
    }
    if (session('status') == 'green') {
        $bgColor = 'bg-emerald-500';
    }

@endphp

@if (session('message'))
    <div class="{{ $bgColor }} w1/2 mx-auto p-2 my-4 text-white">
        {{ session('message') }}
    </div>
@endif
