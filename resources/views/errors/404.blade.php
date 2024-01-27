@extends('layouts.site')
@section('title', 'Page not found')
@section('content')
@include('errors._template', ['code' => 404, 'message' => 'Page not found'])
@endsection
