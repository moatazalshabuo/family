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
                                                                                <th>عنوان الصندوق</th>
                                                                                <th>الرقم الطني</th>
                                                                                <th>الاسم</th>
                                                                                <th>اللقب</th>
                                                                                <th>المدينة</th>
                                                                                <th>القيمة</th>
                                                                                <th>المدفوع</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($box as $item)
                                                                            <tr>
                                                                                <td>{{ $item->box->name_box }}</td>
                                                                                <td>{{ $item->user->NId }}</td>
                                                                                <td>{{ $item->user->name }}</td>
                                                                                <td>{{ $item->user->surename }}</td>
                                                                                <td>{{ $item->user->city }}</td>
                                                                                <td>{{ $item->price }}</td>
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
