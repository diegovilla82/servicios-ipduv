@props(['title'])

@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{ $title }}</h1>
@stop

@section('content')
    {{ $slot }}
@stop

@section('js')

@stop
