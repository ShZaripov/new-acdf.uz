@extends('layouts.site')
@section('title', 'Service Unavailable Error')
@section('content')
@include('errors._template', ['code' => 503, 'message' => 'Service Unavailable Error'])
@endsection
