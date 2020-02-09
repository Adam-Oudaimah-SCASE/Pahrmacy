@extends('layouts.master')
@section('content')
<section id="main-content">
    <section class="wrapper" >
        <h3><i class="fa fa-angle-right"></i>استلام طلبية</h3>
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> معلومات </h4>
                    <form class="form-horizontal style-form" action="" method="POST">
                    @csrf
                
                    <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> عدد الوحدات ضمن العلبة </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="unit_number"> 
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> عدد الوحدات</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="units_number"> 
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> عدد العلب</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="packages_number"> 
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">سعر المبيع للعلبة</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="package_sell_price"> 
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">السعر الصافي للعلبة</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="package_net_price"> 
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">سعر المبيع للظرف</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="unit_sell_price"> 
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">السعر الصافي للظرف</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="unit_net_price"> 
                            </div>
                        </div>
                        <button type="submit" class="btn btn-theme">إضافة </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
