@extends('admin.layouts.master')
@section('title','افزودن فیلم')
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
                <h6 class="card-title">ایجاد فیلم</h6>
                <form id="movieForm" action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="نام" dir="rtl" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تصویر</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file text-left" dir="rtl" name="image" accept="png,webp,jpg,jpeg">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">دسته بندی</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="category" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پس زمینه</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file text-right" dir="rtl" name="background" accept="png,webp,jpg,jpeg">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تریلر</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file text-right" dir="rtl" name="trailer">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ژانر</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="ترسناک" name="genre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">کارگردان</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="عطاران"  name="director">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">کامنت گذاری</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="commentable" name="commentable">
                               <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تعداد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-right" name="count">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">زمان</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-right" name="time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">توضیحات</label>
                        <div class="col-sm-10">
                            <textarea class="form-control text-left" rows="5" name="description"></textarea>
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
