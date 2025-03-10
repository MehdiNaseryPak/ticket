@extends('admin.layouts.master')
@section('title','افزودن بازیگر')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/select2/css/select2.min.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title">ایجاد بازیگر</h6>
                <form action="{{ route('admin.movies.actor.store',$movie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">بازیگران</label>
                        <div class="col-sm-10">
                            <select name="actors[]" class="actors" multiple="multiple">
                                @foreach($actors as $actor)
                                    <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-uppercase">
                            <i class="ti-check-box m-r-5"></i> ذخیره
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin-assets/vendors/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".actors").select2({dir: "rtl"});
        });
    </script>
@endsection
