@extends('/layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>إضافة دواء</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> معلومات الدواء</h4>
                    <form class="form-horizontal style-form" action="{{route('drugs.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">الاسم العربي</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name_arabic">
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">الاسم الانكليزي</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name_english">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">التركيبة الكيميائية</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="chemical_composition"></textarea>
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">خجم العبوة</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="volume_unit">
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> عدد الوحدات</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="unit_number">
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> سعر المبيع</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sell_price">
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> السعر الصافي</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="net_price">
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> رقم الترخيص الخاص بالمنتج الدوائي</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lic_palte">
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> الباركود المحلي</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="local_barcode">
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> الباركود </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="global_barcode">
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> الشركة </label>
                            <div class="col-sm-10">
                                <select name="company_id">
                                    @foreach($companies as $company)
                                    <option value="{{$company->id }}">{{$company->name }} </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                      
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> الصنف </label>
                            <div class="col-sm-10">
                                <select name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id }}">{{$category->name }} </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> الشكل </label>
                            <div class="col-sm-10">
                                <select name="shape_id">
                                    @foreach($shapes as $shape)
                                    <option value="{{$shape->id }}">{{$shape->name }} </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        


                        <button type="submit" class="btn btn-theme">إضافة</button>

                    </form>
                </div>
            </div>
            <!-- col-lg-12-->
        </div>
        <!-- /row -->



    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->

@endsection