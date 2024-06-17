@extends('layouts.main');

@if(!auth()->check() || (auth()->check() && auth()->user()->type == 'C'))
    <x-app-layout>

    </x-app-layout>
@else
    <p>You do not have access to this page.</p>
@endif
