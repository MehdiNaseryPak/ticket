@extends('admin.layouts.master')
@section('title','ویرایش جایگاه')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title">ویرایش جایگاه</h6>
                <form action="{{ route('admin.positions.update',$position->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ردیف</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $position->row }}" dir="rtl" name="row">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">شماره</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $position->number }}" dir="rtl" name="number">
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
