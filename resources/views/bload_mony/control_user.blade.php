@extends('layouts.master')

@section('title')
    حساب الفرد
@endsection
@section('title-page')
    حساب الفرد
@endsection
@section('content')
    <div class="row column1" dir="rtl">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>المستحقات على المستخدم</h2>
                    </div>
                </div>
                <div class="full progress_bar_inner p-3">
                    @if (Session::has('success'))
                        <div class="alert alert-success m-2">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-error m-2">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form method="get" action="" class="mt-5" dir="rtl">

                        <select class="select2-d form-control" name="user">
                            <option value="">اختر الفرد</option>
                            @foreach ($users as $item)
                                <option @selected(old('user') == $item->id) value="{{ $item->id }}">{{ $item->NId }} -
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-primary">البحث</button>
                    </form>
                    <hr>
                    @empty($user_box)
                    <p class="text-center">لا يوجد مستحقات لعرضها
                    </p>
                    @else
                        <form method="POST" action="{{ route('blood.push',$_GET['user']) }}">
                            @csrf
                            @foreach ($user_box as $item)
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>{{ $item->blood->name_box }}

                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <label>المطلوب</label>
                                        <input type="number" disabled class="form-control" value="{{$item->price - $item->value_in }}" >
                                    </div>
                                    <div class="col-md-2">
                                        <label>دفع</label>
                                        <input type="number" min=0 max="{{$item->price - $item->value_in }}" class="form-control" value="0" name="pay{{$item->box_id}}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>المدفوع</label>
                                        <input type="number" disabled class="form-control" value="{{$item->value_in }}" >
                                    </div>
                                    <div class="col-md-2">
                                        <label>استرجاع</label>
                                        <input type="number" min=0 max="{{$item->value_in }}" class="form-control" value="0" name="unpay{{$item->box_id}}">
                                    </div>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary m-3">حفظ</button>
                        </form>

                    @endempty

                </div>
            </div>
        </div>

    </div>
@endsection
