@extends('/layouts.master')
@section('content')
<section id="main-content">
    <section class="wrapper" dir="rtl">
        <h3><i class="fa fa-angle-right"></i>إضافة مستودع</h3>
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i>معلومات المستودع</h4>
                    <form class="form-horizontal style-form" action="{{ route('warehouse.store') }}" method="POST">
                    @csrf
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">اسم المستودع:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">عنوان المستودع</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">رقم التواصل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">موعد الزيارة الأسبوعي</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="weekly_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">البريد الالكتروني</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">الفاكس</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fax">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-theme">إضافة مستودع</button>
                </form>
            </div>
        </div>
    </section>
 </section>
 @endsection
