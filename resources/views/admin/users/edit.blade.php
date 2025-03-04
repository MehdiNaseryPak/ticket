@extends('admin.layouts.master')
@section('title','ویرایش کاربر')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title">ویرایش کاربر</h6>
                <form action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $user->name }}" dir="rtl" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تصویر</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control text-left" dir="rtl" name="image" accept="png,webp,jpg,jpeg">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تصویر</label>
                        <div class="col-sm-10">
                            <img src="{{ asset('images/users/small/'.$user->image) }}" alt="{{ $user->name }}" width="80" height="80" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تاریخ تولد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-right" value="{{ $user->birthdate }}" dir="ltr" name="birthdate">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">کلمه عبور</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control text-right" dir="ltr" name="password">
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
