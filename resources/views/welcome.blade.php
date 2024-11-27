@extends('layouts.app')

@section('content')
    @if(request()->routeIs('home'))
        @livewire('home')
    @elseif(request()->routeIs('login'))
        @livewire('login')
    @elseif(request()->routeIs('register'))
        @livewire('register')
    @elseif(request()->routeIs('contact'))
        @livewire('contact-form')
    @endif
@endsection