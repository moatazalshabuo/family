@extends('layouts.master')

@section('title')
    المستثنين
@endsection
@section('title-page')
   المستثنين
@endsection
@section('content')
    <div class="row column1" dir="rtl">
        @if (Auth::user()->type == 1)
        <div class="col-md-12 mt-1">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>اضافة استثناء</h2>
                    </div>
                </div>
                <div class="full progress_bar_inner p-2">
                    <form method="post" action="{{ route('excluded.store') }}">
                        @csrf
                        <div class="row text-right" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Qualification" class="">الرقم الوطني</label>
                                    <select class="select2-d form-control" name="id" required>
                                        <option value="">اختر الرقم</option>
                                        @foreach ($users as $item)
                                            <option value="{{$item->id}}">{{$item->NId}} - {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name" class="">تفاصيل الاستثناء</label>
                                    <input type="text" name="descripe" class="form-control" placeholder="تفاصيل الاستثناء">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary m-2">اضافة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @if (Auth::user()->type == 2 || Auth::user()->type == 1)
        <div class="col-md-12">
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
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>الرقم الطني</th>
                                                    <th>الاسم</th>
                                                    <th>اللقب</th>
                                                    <th>المدينة</th>
                                                    <th>وصف الاستثناء</th>
                                                    <th>تاريخ الاستثناء</th>
                                                    <th>حذف الاستثناء</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Excul as $item)
                                                <tr>
                                                    <td>{{ $item->user->NId }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->user->surename }}</td>
                                                    <td>{{ $item->user->city }}</td>
                                                    <td>{{ $item->descripe }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        @if (Auth::user()->type == 1)
                                                        <form action="{{ route('excluded.delete',$item->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn "><i class="fa fa-trash red_color"></i></button>
                                                        </form>
                                                        @endif
                                                    </td>
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
        @endif
    </div>
@endsection
