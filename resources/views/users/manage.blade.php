@extends('layouts.master')

@section('title')
    اضافة فرد جديد
@endsection
@section('title-page')
    اضافة فرد جديد
@endsection
@section('content')
    <div class="row column1" dir="rtl">
        <div class="col-md-12 mt-1">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>البحث</h2>
                    </div>
                </div>
                <div class="full progress_bar_inner p-2">
                    <form method="GET" action="">
                        <div class="row text-right">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Qualification" class="">الرقم الوطني</label>
                                    <input type="text" name="NId" class="form-control" placeholder="الرقم الوطني">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name" class="">الاسم</label>
                                    <input type="text" name="name" class="form-control" placeholder="الاسم">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Qualification" class="">المؤهل العلمي</label>
                                    <select id="Qualification" name="Qualification"
                                        class="form-control @error('Qualification') is-invalid @enderror">
                                        <option value="">اختر المؤهل العلمي</option>
                                        <option @selected(old('Qualification') == 'لايوجد') value="لايوجد">لايوجد</option>
                                        <option @selected(old('Qualification') == 'اساسي') value="اساسي">اساسي</option>
                                        <option @selected(old('Qualification') == 'متوسط') value="متوسط">متوسط</option>
                                        <option @selected(old('Qualification') == 'ثانوي') value="ثانوي">ثانوي</option>
                                        <option @selected(old('Qualification') == 'باكالوريوس') value="باكالوريوس">باكالوريوس
                                        </option>
                                        <option @selected(old('Qualification') == 'ماجستير') value="ماجستير">ماجستير
                                        </option>
                                        <option @selected(old('Qualification') == 'دكتورا') value="دكتورا">دكتورا</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gander" class="">الجنس</label>
                                    <select id="gander" name="gander"
                                        class="form-control @error('gander') is-invalid @enderror">
                                        <option value="">اختر الجنس</option>
                                        <option @selected(old('gander') == 1) value="1">ذكر</option>
                                        <option @selected(old('gander') == 2) value="2">انثى</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">البحث</button>
                    </form>
                </div>
            </div>
        </div>
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
                                                    <th>العمر</th>
                                                    <th>المدينة</th>
                                                    <th>رقم الهاتف</th>

                                                    <th>المؤهل العلمي</th>
                                                    <th>التخصص</th>
                                                    <th>الحالة الاجتماعية</th>
                                                    <th>التوظيف</th>
                                                    <th>الحالة</th>
                                                    <th>ادارة</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $item)
                                                    <tr>

                                                        <td>{{ $item->NId }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->surename }}</td>
                                                        <td>{{ $item->age }}</td>
                                                        <td>{{ $item->city }}</td>
                                                        <td>{{ $item->phone }}</td>

                                                        <td>{{ $item->Qualification }}</td>
                                                        <td>{{ $item->Specialization }}</td>
                                                        <td>
                                                            @if ($item->marital_status == 1)
                                                                اعزب
                                                            @elseif($item->marital_status == 2)
                                                                متزوج
                                                            @elseif($item->marital_status == 3)
                                                                مطلق
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->is_work == 1)
                                                                موظف
                                                            @else
                                                                عاطل
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->life == 1)
                                                                حي
                                                            @else
                                                                متوفي
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->admin == 1)
                                                                @if (Auth::user()->admin == 1)
                                                                    <a href="{{ route('users.edit', $item->id) }}"><i
                                                                            class="fa fa-edit yellow_color"></i></a>
                                                                @endif
                                                            @else
                                                                <a href="{{ route('users.edit', $item->id) }}"><i
                                                                        class="fa fa-edit yellow_color"></i></a>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-felx justify-content-center">

                                            {{ $users->links() }}

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
