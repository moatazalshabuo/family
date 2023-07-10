@extends('layouts.master')

@section('title')
   الدية
@endsection
@section('title-page')
    الدية
@endsection
@section('content')
    <div class="row column1" dir="rtl">

        <div class="col-md-10">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>اضافة صندوق دية</h2>
                    </div>
                </div>
                <div class="full progress_bar_inner">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="full">
                                <div class="padding_infor_info">
                                    <form method="POST" action="{{ route('blood.store') }}">
                                        @csrf
                                        <div class="row text-right">
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="name_box" class="">عنوان صندوق الدية</label>
                                                    <input id="name_box" type="text"
                                                        class="form-control @error('name_box') is-invalid @enderror"
                                                        name="name_box" value="{{ old('name_box') }}" required
                                                        autocomplete="name" autofocus>
                                                    @error('name_box')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="value" class="">القيمة</label>
                                                    <input id="value" type="text"
                                                        class="form-control @error('value') is-invalid @enderror"
                                                        name="value" value="{{ old('value') }}" required
                                                        autocomplete="value" autofocus>

                                                    @error('value')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h4>الافراد الذين ينطبق عليهم</h4>
                                                <hr>
                                            </div>
                                            <div class="col-md-3">
                                                <label>العمر اكبر من</label>
                                                <input type="number" name="age" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>الحالة الوظيفية</label>
                                                <select class="form-control" name="is_work">
                                                    <option value="">الحالة الوظيفية</option>
                                                    <option value="1">موظف</option>
                                                    <option value="0">عاطل</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>الجنس</label>
                                                <select class="form-control" name="gander">
                                                    <option value="">الجنس</option>
                                                    <option value="1">ذكر</option>
                                                    <option value="0">انثى</option>
                                                </select>

                                            </div>
                                            <div class="col-md-4">
                                                <label>الحالة الاجتماعية</label>
                                                <select class="form-control" name="marital_status">
                                                    <option value="">الحالة الاجتماعية</option>
                                                    <option @selected(old('marital_status') == '1') value="1">اعزب</option>
                                                    <option @selected(old('marital_status') == '2') value="2">متزوج</option>
                                                    <option @selected(old('marital_status') == '3') value="3">مطلق</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>حسب المدينة</label>
                                                <select id="city"
                                                    class="form-control select2-d @error('city') is-invalid @enderror"
                                                    name="city" >
                                                    <option value="">اختر المدينة</option>
                                                    <option value="طرابلس">طرابلس</option>
                                                    <option value="بنغازي">بنغازي</option>
                                                    <option value="مصراتة">مصراتة</option>
                                                    <option value="الزاوية">الزاوية</option>
                                                    <option value="سبها">سبها</option>
                                                    <option value="زليتن">زليتن</option>
                                                    <option value="صبراتة">صبراتة</option>
                                                    <option value="غريان">غريان</option>
                                                    <option value="سرت">سرت</option>
                                                    <option value="اجدابيا">اجدابيا</option>
                                                    <option value="درنة">درنة</option>
                                                    <option value="طبرق">طبرق</option>
                                                    <option value="ترهونة">ترهونة</option>
                                                    <option value="الكفرة">الكفرة</option>
                                                    <option value="القبة">القبة</option>
                                                    <option value="بني-وليد">بني وليد</option>
                                                    <option value="المرج">المرج</option>
                                                    <option value="نالوت">نالوت</option>
                                                    <option value="صرمان">صرمان</option>
                                                    <option value="تاورغاء">تاورغاء</option>
                                                    <option value="يفرن">يفرن</option>
                                                    <option value="زوارة">زوارة</option>
                                                    <option value="أوباري">أوباري</option>
                                                    <option value="مرزق">مرزق</option>
                                                    <option value="البريقة">البريقة</option>
                                                    <option value="هون">هون</option>
                                                    <option value="جالو">جالو</option>
                                                    <option value="سلوق">سلوق</option>
                                                    <option value="الأصابعة">الأصابعة</option>
                                                    <option value="الزنتان">الزنتان</option>
                                                    <option value="الجفرة">الجفرة</option>
                                                    <option value="مزدة">مزدة</option>
                                                    <option value="البطنان">البطنان</option>
                                                    <option value="الجبل-الأخضر">الجبل الأخضر</option>
                                                    <option value="الواحات">الواحات</option>
                                                    <option value="وادي-الشاطئ">وادي الشاطئ</option>
                                                    <option value="وادي-الحياة">وادي الحياة</option>
                                                    <option value="غات">غات</option>
                                                    <option value="المرقب">المرقب</option>
                                                    <option value="الجفارة">الجفارة</option>
                                                    <option value="الجبل-الغربي">الجبل الغربي</option>
                                                    <option value="توكرة">توكرة</option>
                                                    <option value="الأبيار">الأبيار</option>
                                                    <option value="أوجلة">أوجلة</option>
                                                    <option value="مردة">مردة</option>
                                                    <option value="راس-لانوف">راس لانوف</option>
                                                    <option value="ودان">ودان</option>
                                                    <option value="براك">براك</option>
                                                    <option value="الماية">الماية</option>
                                                    <option value="الجميل">الجميل</option>
                                                    <option value="غدامس">غدامس</option>
                                                    <option value="سوسة">سوسة</option>
                                                    <option value="العجيلات">العجيلات</option>
                                                    <option value="رقدالين">رقدالين</option>
                                                    <option value="زلطن">زلطن</option>
                                                    <option value="مسلاتة">مسلاتة</option>
                                                    <option value="الخمس">الخمس</option>
                                                    <option value="قصر-الاخيار">قصر الاخيار</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12m-3">
                                                <div class="form-group">
                                                    <label>هل قمت بتعبئة كل الحقول</label>
                                                    <input type="checkbox" required>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary ">
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
