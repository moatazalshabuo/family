@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surename" class="col-md-4 col-form-label text-md-end">اللقب</label>

                                <div class="col-md-6">
                                    <input id="surename" type="text"
                                        class="form-control @error('surename') is-invalid @enderror" name="surename"
                                        value="{{ old('surename') }}" required autocomplete="surename" autofocus>

                                    @error('surename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">المدينة</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                        class="form-control @error('city') is-invalid @enderror" name="city"
                                        value="{{ old('city') }}" required autocomplete="city" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="birthday" class="col-md-4 col-form-label text-md-end">تاريخ الميلاد</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date"
                                        class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                                        value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gander" class="col-md-4 col-form-label text-md-end">الجنس</label>

                                <div class="col-md-6">
                                    <select id="gander" name="gander"
                                        class="form-control @error('gander') is-invalid @enderror" required>
                                        <option @selected(old('gander') == 1) value="1">ذكر</option>
                                        <option @selected(old('gander') == 2) value="2">انثى</option>
                                    </select>
                                    @error('gander')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">رقم الهاتف</label>

                                <div class="col-md-6">
                                    <input id="phone" name="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror" type="number" required>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="NId" class="col-md-4 col-form-label text-md-end">الرقم الوطني</label>

                                <div class="col-md-6">
                                    <input id="NId" name="NId" value="{{ old('NId') }}"
                                        class="form-control  @error('NId') is-invalid @enderror" type="number"
                                        min="110000000000" max="230000000000" required>

                                    @error('NId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Qualification" class="col-md-4 col-form-label text-md-end">المؤهل العلمي</label>

                                <div class="col-md-6">
                                    <select id="Qualification" name="Qualification"
                                        class="form-control @error('Qualification') is-invalid @enderror" required>
                                        <option @selected(old('Qualification') == 'اساسي') value="اساسي">اساسي</option>
                                        <option @selected(old('Qualification') == 'متوسط') value="متوسط">متوسط</option>
                                        <option @selected(old('Qualification') == 'ثانوي') value="ثانوي">ثانوي</option>
                                        <option @selected(old('Qualification') == 'باكالوريوس') value="باكالوريوس">باكالوريوس</option>
                                        <option @selected(old('Qualification') == 'ماجستير') value="ماجستير">ماجستير</option>
                                        <option @selected(old('Qualification') == 'دكتورا') value="دكتورا">دكتورا</option>
                                    </select>
                                    @error('Qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Specialization" class="col-md-4 col-form-label text-md-end">التخصص</label>

                                <div class="col-md-6">
                                    <input id="Specialization" value="{{ old('Specialization') }}" name="Specialization"
                                        class="form-control @error('Specialization') is-invalid @enderror" type="text"
                                        required placeholder="لايوجد او كتابة التخصص">

                                    @error('Specialization')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="FNId" class="col-md-4 col-form-label text-md-end"> الرقم الوطني
                                    للاب</label>

                                <div class="col-md-6">
                                    <input id="FNId" name="FNId" value="{{ old('FNId') }}"
                                        class="form-control @error('FNId') is-invalid @enderror" min="110000000000"
                                        max="130000000000" type="number" required>

                                    @error('FNId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="MNId" class="col-md-4 col-form-label text-md-end"> الرقم الوطني
                                    للام</label>

                                <div class="col-md-6">
                                    <input id="MNId" name="MNId" value="{{ old('MNId') }}"
                                        class="form-control @error('MNId') is-invalid @enderror" min="210000000000"
                                        max="230000000000" type="number" required>

                                    @error('MNId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="marital_status" class="col-md-4 col-form-label text-md-end">الحالة
                                    الاجتماعية</label>
                                <div class="col-md-6">
                                    <select id="marital_status" name="marital_status"
                                        class="form-control @error('marital_status') is-invalid @enderror" required>
                                        <option @selected(old('marital_status') == '1') value="1">اعزب</option>
                                        <option @selected(old('marital_status') == '2') value="2">متزوج</option>
                                        <option @selected(old('marital_status') == '3') value="3">مطلق</option>
                                    </select>
                                    @error('marital_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="is_work" class="col-md-4 col-form-label text-md-end">التوظيف</label>

                                <div class="col-md-6">
                                    <label>موظف</label>
                                    <input type="radio" @checked(old('is_work') == 1) name="is_work" value="1">
                                    <label>عاطل</label>
                                    <input type="radio" @checked(old('is_work') == 0) name="is_work" value="0">
                                    @error('is_work')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="life" class="col-md-4 col-form-label text-md-end">الحالة </label>

                                <div class="col-md-6">
                                    <label>على قيد الحياة</label>
                                    <input type="radio" @checked(old('life') == 1) name="life" value="1">
                                    <label>متوفي</label>
                                    <input type="radio" @checked(old('life') == 0) name="life" value="0">
                                    @error('life')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
