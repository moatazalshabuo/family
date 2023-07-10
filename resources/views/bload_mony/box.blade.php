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
                                        <div class="col-md-6 col-lg-3">
                                           <div class="full counter_section margin_bottom_30">
                                              <div class="couter_icon">
                                                 <div>
                                                    <i class="fa fa-user yellow_color"></i>
                                                 </div>
                                              </div>
                                              <div class="counter_no">
                                                 <div>
                                                    <p class="total_no">{{ count($box_user) }}</p>
                                                    <p class="head_couter">عدد المشتركين</p>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>


                                            <div class="col-md-6 col-lg-3">
                                                <div class="full counter_section margin_bottom_30">
                                                <div class="couter_icon">
                                                    <div>
                                                        <i class="fa fa-money green_color"></i>
                                                    </div>
                                                </div>
                                                <div class="counter_no">
                                                    <div>
                                                        <p class="total_no">{{ $bloodMoney->all_value }}</p>
                                                        <p class="head_couter">الاجمالي</p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                        @if ($bloodMoney->all_value)
                                        <div class="col-md-6 col-lg-3">
                                           <div class="full counter_section margin_bottom_30">
                                              <div class="couter_icon">
                                                 <div>
                                                    <i class="fa fa-check green_color"></i>
                                                 </div>
                                              </div>
                                              <div class="counter_no">
                                                 <div>
                                                    <p class="total_no">{{ $box_user_active }}</p>
                                                    <p class="head_couter">عدد من قامو بالدفع</p>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                        @endif
                                        <div class="col-md-6 col-lg-3">
                                           <div class="full counter_section margin_bottom_30">
                                              <div class="couter_icon">
                                                 <div>
                                                    <i class="fa fa-comments-o red_color"></i>
                                                 </div>
                                              </div>
                                              <div class="counter_no">
                                                 <div>
                                                    <p class="total_no">{{ $bloodMoney->value_in }}</p>
                                                    <p class="head_couter">المبلغ المدفوع</p>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                    <div class="row column1">
                                        <div class="white_shd full margin_bottom_30">
                                            <div class="full graph_head">
                                                <div class="heading1 margin_0">
                                                    <h2>الافراد</h2>
                                                </div>
                                            </div>
                                            <div class="full progress_bar_inner">
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('success') }}
                                                    </div>
                                                @endif
                                                @if (Session::has('error'))
                                                    <div class="alert alert-error">
                                                        {{ Session::get('error') }}
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="full">
                                                            <div class="table_section padding_infor_info">
                                                                <div class="table-responsive-sm">
                                                                    <table class="table" id="myTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>الرقم الطني</th>
                                                                                <th>الاسم</th>
                                                                                <th>اللقب</th>
                                                                                <th>المدينة</th>
                                                                                <th>المدفوع</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($box_user as $item)
                                                                            <tr>
                                                                                <td>{{ $item->user->NId }}</td>
                                                                                <td>{{ $item->user->name }}</td>
                                                                                <td>{{ $item->user->surename }}</td>
                                                                                <td>{{ $item->user->city }}</td>
                                                                                <td>{{ $item->value_in }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="d-felx justify-content-center">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
