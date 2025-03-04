@extends('admin.layouts.master')
@section('title','افزودن جایگاه')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title">ایجاد جایگاه</h6>
                <form action="{{ route('admin.positions.store') }}" method="POST" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ردیف</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="ردیف" dir="rtl" name="row">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">شماره</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="شماره" dir="rtl" name="number">
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
