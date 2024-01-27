@extends('layouts.site')
@section('title', 'Forbidden')
@section('content')
@include('errors._template', ['code' => '403', 'message' => 'Forbidden'])
@endsection
