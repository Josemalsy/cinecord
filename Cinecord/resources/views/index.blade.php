@extends('layouts.app')

@section('content')

{{auth()->user()->rol}}

@endsection