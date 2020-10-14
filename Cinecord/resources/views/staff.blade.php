@extends('layouts.app')

@section('content')

{{auth()->user()->name}}

@endsection