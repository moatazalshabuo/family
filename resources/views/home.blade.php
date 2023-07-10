@extends('layouts.master')

@section('title')
    الصفحة الرئيسية
@endsection
@section('title-page')
    الرئيسية
@endsection
@section('content')
    <div class="row column1">
        @if (Auth::user()->type == 1 || Auth::user()->type == 0)
            <div class="col-md-6">
                {{-- <div class="row"> --}}
                <div class="row column1 social_media_section">
                    <div class="col-md-6 ">
                        <div class="full socile_icons fb margin_bottom_30">
                            <div class="social_icon">
                                <span><i class="fa fa-users"></i></span>
                            </div>
                            <div class="social_cont">
                                <ul>
                                    <li>
                                        <span><strong>{{ $countMale }}</strong></span>
                                        <span>الذكور</span>
                                    </li>
                                    <li>
                                        <span><strong>{{ $countFaMale }}</strong></span>
                                        <span>الاناث</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="full socile_icons tw margin_bottom_30">
                            <div class="social_icon">
                                <span><i class="fa fa-money"></i></span>
                                <div class="social_cont">
                                    <ul>
                                        <li>
                                            <span><strong>{{ $countT1 }}</strong></span>
                                            <span>الصناديق الشهرية</span>
                                        </li>
                                        <li>
                                            <span><strong>{{ $countT0 }}</strong></span>
                                            <span>الصناديق لمرة واحدة</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="full socile_icons linked margin_bottom_30">
                            <div class="social_icon">
                                <span><i class="fa fa-money red_color"></i></span>
                            </div>
                            <div class="social_cont">
                                <ul>

                                    <li>
                                        <span><strong>{{ $countBlood }}</strong></span>
                                        <span>عدد صناديق الدية</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
        <div class="col-md-6">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>الاشعارات</h2>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm" style="height: 300px;overflow-y: scroll">
                        <table class="table " dir="rtl">
                            <thead>
                                <tr>
                                    <th>العنوان</th>
                                    <th>التفاصيل</th>
                                    <th>التوقيت</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unreadnoty as $item)
                                    <tr style="background-color: #f2f2f2">
                                        <td>{{ $item->data['data']['name'] }}</td>
                                        <td>{{ $item->data['data']['title'] }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach

                                @foreach ($readnoty as $item)
                                    <tr>
                                        <td>{{ $item->data['data']['name'] }}</td>
                                        <td>{{ $item->data['data']['title'] }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
