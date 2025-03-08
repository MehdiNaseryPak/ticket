@extends('admin.layouts.master')
@section('title','افزودن گالری')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title">ایجاد گالری</h6>
                <form action="{{ route('admin.movies.gallery.store',$movie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تصویر</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file text-left"  name="image">
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
