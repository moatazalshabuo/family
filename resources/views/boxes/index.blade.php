@extends('layouts.master')

@section('title')
    ادارة الصناديق
@endsection
@section('title-page')
    ادارة الصناديق
@endsection
@section('content')
    <div class="row column1" dir="rtl">

        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>ادارة الصناديق</h2>
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
                                    <div class="row column1">
                                        @foreach ($boxes as $item)
                                            <div class="col-md-6 col-lg-3">
                                                <div class="full counter_section margin_bottom_30">
                                                    <a  href="{{route('box.show',$item->id)}}">
                                                        <div class="couter_icon">
                                                            <div>
                                                                <i class="fa fa-money green_color"></i>
                                                            </div>
                                                        </div>
                                                        <div class="counter_no">
                                                            <div>
                                                                <p class="head_couter">{{ $item->name_box }}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
