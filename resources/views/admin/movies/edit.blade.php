@extends('admin.layouts.master')
@section('title','ویرایش فیلم')
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
                <h6 class="card-title">ویرایش فیلم</h6>
                <form action="{{ route('admin.movies.update',$movie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $movie->name }}" dir="rtl" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تصویر</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file text-left" dir="rtl" name="image" accept="png,webp,jpg,jpeg">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تصویر</label>
                        <div class="col-sm-10">
                            <img src="{{ asset('images/movies/small/'.$movie->image) }}" alt="{{ $movie->name }}" width="80" height="80" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">دسته بندی</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="category" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $movie->cat_id) selected @endif>{{$category->name}}</option>
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
                        <label class="col-sm-2 col-form-label">پس زمینه</label>
                        <div class="col-sm-10">
                            <img src="{{ asset('images/movies/small/'.$movie->background) }}" alt="{{ $movie->name }}" width="80" height="80" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تریلر</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file text-right" dir="rtl" name="trailer">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پس زمینه</label>
                        <div class="col-sm-10">
                            <video class="w-25" autoplay loop muted>
                                <source src="{{ asset("storage/trailers/".$movie->trailer) }}" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ژانر</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{ $movie->genre }}" name="genre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">کارگردان</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $movie->director }}" name="director">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">کامنت گذاری</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="commentable" name="commentable">
                                <option value="1" @if($movie->commentable == 1) selected @endif>فعال</option>
                                <option value="0" @if($movie->commentable == 0) selected @endif>غیرفعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تعداد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-right" value="{{ $movie->count }}" name="count">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">زمان</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-right" value="{{ $movie->time }}" name="time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">توضیحات</label>
                        <div class="col-sm-10">
                            <textarea class="form-control text-left" rows="5" name="description">{{ $movie->description }}</textarea>
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
