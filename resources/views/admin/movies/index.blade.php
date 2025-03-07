@extends('admin.layouts.master')
@section('title','لیست فیلم ها')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{\Illuminate\Support\Facades\Session::get('message')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <livewire:admin.movie-list />
        </div>
    </div>
@endsection
