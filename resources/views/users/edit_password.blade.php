@extends('layouts.master')

@section('title')
    تغيير كلمة المرور
@endsection
@section('title-page')
    تغيير كلمة المرور
@endsection
@section('content')
    <div class="row column1" dir="rtl">

        <div class="col-md-10">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>تغيير كلمة المرور</h2>
                    </div>
                </div>
                <div class="full progress_bar_inner">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="full">
                                <div class="padding_infor_info">
                                    <form method="POST" action="{{ route('save_password') }}">
                                        @csrf

                                        <div class="row text-right">

                                            <div class="col-md-12">
                                                <label >كلمة السر الحالية</label>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                                    required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label >كلمة السر الجديدة</label>
                                                <input id="newpassword" type="password"
                                                    class="form-control @error('password') is-invalid @enderror" name="newpassword"
                                                    required autocomplete="new-password">

                                                @error('newpassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            التسجيل
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
