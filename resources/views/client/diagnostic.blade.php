@extends('layouts.master')
@section('title')
    Diagnostic en ligne | Inspecto
@endsection

@section('scripts')
    @vite('resources/js/app.js')
@endsection

@section('body')
<div id="app">
    <diagnostic />
</div>
@endsection

@section('styles')
<style>
    .test{
        box-shadow: 0px 8px 0px 0px #e4f8e1;
    }

    .select{
        display: inline-flex;
        cursor: pointer;
        user-select: none;
        appearance: none;
        outline: none;
        height: 40px;
        padding-left: 1rem;
        padding-right: 2.5rem;
        font-size: 0.875rem;
        line-height: 1.25rem;
        line-height: 2;
        border-width: 1px;
        border-color: #d2d4d7;
        border-radius: 5px;
        background-image: linear-gradient(45deg, transparent 50%, currentColor 50%), linear-gradient(135deg, currentColor 50%, transparent 50%);
        background-position: calc(100% - 20px) calc(1px + 50%), calc(100% - 16.1px) calc(1px + 50%);
        background-size: 4px 4px, 4px 4px;
        background-repeat: no-repeat;
    }
</style>
@endsection