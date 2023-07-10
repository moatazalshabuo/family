@extends('layouts.master')

@section('title')
    تعديل بيانات فرد
@endsection
@section('title-page')
    تعديل بيانات فرد
@endsection
@section('content')
    <div class="row column1" dir="rtl">

        <div class="col-md-10">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>تعديل بيانات {{ $user->name }}</h2>
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
                                    <form action="{{route('users.update',$user->id)}}" method="POST">
                                        {{csrf_field()}}

                                        @method('PUT')
                                        <div class="row text-right">
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="name" class="">الاسم</label>
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name',$user->name) }}" required
                                                        autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="surename" class="">اللقب</label>
                                                    <input id="surename" type="text"
                                                        class="form-control @error('surename') is-invalid @enderror"
                                                        name="surename" value="{{ old('surename',$user->surename) }}" required
                                                        autocomplete="surename" autofocus>
                                                    @error('surename')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="city" class="">المدينة</label>
                                                    <select id="city"
                                                        class="form-control select2-d @error('city') is-invalid @enderror"
                                                        name="city" required
                                                        >
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
                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="birthday" class="">تاريخ الميلاد</label>
                                                    <input id="birthday" type="date"
                                                        class="form-control @error('birthday') is-invalid @enderror"
                                                        name="birthday" value="{{ old('birthday',$user->birthday) }}" required
                                                        autocomplete="birthday" autofocus>
                                                    @error('birthday')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="gander" class="">الجنس</label>
                                                    <select id="gander" name="gander"
                                                        class="form-control @error('gander') is-invalid @enderror" required>
                                                        <option @selected(old('gander',$user->gander) == 1) value="1">ذكر</option>
                                                        <option @selected(old('gander',$user->gander) == 2) value="2">انثى</option>
                                                    </select>
                                                    @error('gander')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="phone" class="">رقم الهاتف</label>
                                                    <input id="phone" name="phone" value="{{ old('phone',$user->phone) }}"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        type="number" >
                                                        <small>اختياري</small>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="NId" class="">الرقم الوطني</label>
                                                    <input id="NId" name="NId" value="{{ old('NId',$user->NId) }}"
                                                        class="form-control  @error('NId') is-invalid @enderror"
                                                        type="number" min="110000000000" max="230000000000" required>
                                                    @error('NId')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="Qualification" class="">المؤهل العلمي</label>
                                                    <select id="Qualification" name="Qualification"
                                                        class="form-control @error('Qualification') is-invalid @enderror"
                                                        required>
                                                        <option @selected(old('Qualification',$user->Qualification) == 'لايوجد') value="لايوجد">لايوجد</option>
                                                        <option @selected(old('Qualification',$user->Qualification) == 'اساسي') value="اساسي">اساسي</option>
                                                        <option @selected(old('Qualification',$user->Qualification) == 'متوسط') value="متوسط">متوسط</option>
                                                        <option @selected(old('Qualification',$user->Qualification) == 'ثانوي') value="ثانوي">ثانوي</option>
                                                        <option @selected(old('Qualification',$user->Qualification) == 'باكالوريوس') value="باكالوريوس">باكالوريوس
                                                        </option>
                                                        <option @selected(old('Qualification',$user->Qualification) == 'ماجستير') value="ماجستير">ماجستير
                                                        </option>
                                                        <option @selected(old('Qualification',$user->Qualification) == 'دكتورا') value="دكتورا">دكتورا</option>
                                                    </select>
                                                    @error('Qualification')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="Specialization" class="">التخصص</label>
                                                    <input id="Specialization" value="{{ old('Specialization',$user->Specialization) }}"
                                                        name="Specialization"
                                                        class="form-control @error('Specialization') is-invalid @enderror"
                                                        type="text" required placeholder="لايوجد او كتابة التخصص">
                                                    @error('Specialization')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="FNId"> الرقم
                                                        الوطني
                                                        للاب</label>
                                                    <input id="FNId" name="FNId" value="{{ old('FNId',$user->FNId) }}"
                                                        class="form-control @error('FNId') is-invalid @enderror"
                                                        min="110000000000" max="130000000000" type="number" required>
                                                        <small>اختياري</small>
                                                    @error('FNId')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="MNId"> الرقم
                                                        الوطني
                                                        للام</label>
                                                    <input id="MNId" name="MNId" value="{{ old('MNId',$user->MNID) }}"
                                                        class="form-control @error('MNId') is-invalid @enderror"
                                                        min="210000000000" max="230000000000" type="number" >
                                                        <small>اختياري</small>
                                                    @error('MNId')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="marital_status">الحالة
                                                        الاجتماعية</label>
                                                    <select id="marital_status" name="marital_status"
                                                        class="form-control @error('marital_status') is-invalid @enderror"
                                                        required>
                                                        <option @selected(old('marital_status',$user->marital_status) == '1') value="1">اعزب</option>
                                                        <option @selected(old('marital_status',$user->marital_status) == '2') value="2">متزوج</option>
                                                        <option @selected(old('marital_status',$user->marital_status) == '3') value="3">مطلق</option>
                                                    </select>
                                                    @error('marital_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label for="marital_status">صلاحية الوصول</label>
                                                    <select id="type" name="type"
                                                        class="form-control @error('type') is-invalid @enderror"
                                                        required>
                                                        @if (Auth::user()->name)
                                                        <option @selected(old('type',$user->type) == '1') value="1">مسؤول النظام</option>
                                                        <option @selected(old('type',$user->type) == '2') value="2">ادارة المنطقة</option>
                                                        @endif
                                                        <option @selected(old('type',$user->type) == '3') value="3">مستخدم عادي</option>
                                                    </select>
                                                    @error('marital_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label>موظف</label>
                                                    <input type="radio" @checked(old('is_work',$user->is_work) == 1) name="is_work"
                                                        value="1">
                                                    <label>عاطل</label>
                                                    <input type="radio" @checked(old('is_work',$user->is_work) == 0) name="is_work"
                                                        value="0">
                                                    @error('is_work')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 my-2">
                                                <div class="form-group">
                                                    <label>على قيد الحياة</label>
                                                    <input type="radio" @checked($user->life == 1) name="life" value="1">
                                                    <label>متوفي</label>
                                                    <input type="radio" name="life" @checked($user->life == 0) value="0">
                                                    @error('life')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">كلمة المرور</label>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password"  autocomplete="new-password">
                                                        <small>ملئ الحقل فقط في حالةاردت تغيير كلمة السر</small>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            التعديل
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
    <script>
        $(function(){
            var da = "{{old('city',$user->city)}}"
            $("#city").val(da).change()
        })
    </script>
@endsection
