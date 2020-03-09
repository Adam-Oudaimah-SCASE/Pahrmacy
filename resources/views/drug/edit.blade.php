@extends('/layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>تعديل دواء</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
             
                    <h4 class="mb"><i class="fa fa-angle-right"></i>معلومات الدواء</h4>
                    <form action="{{ route('drug.update', $drugs->id) }}" method="POST">
                        @csrf
                      
                        @foreach($drugs->repo as $drug)
                        <div class="form-group " dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">الاسم العربي</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name_arabic" value="{{$drug->drug->name_arabic->where('id', $drug->drug_id)}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>

                            <label class="col-sm-2 col-sm-2 control-label">الاسم الانكليزي</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name_english" value="{{$drug->drug->name_english->where('id', $drug->drug_id)}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">التركيبة الكيميائية</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="chemical_composition" value="{{$drug->drug->chemical_composition->where('id', $drug->drug_id)}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">خجم العبوة</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="volume_unit" value="{{$drug->drug->volume_unit->where('id', $drug->drug_id)}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">عدد الوحدات</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="unit_number" value="{{$drug->unit_number}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>



                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">سعر المبيع للعلبة</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="package_sell_price" value="{{$drug->package_sell_price}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">السعر الصافي للعلبة</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="package_net_price" value="{{$drug->package_net_price}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">سعر المبيع للظرف</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="unit_sell_price" value="{{$drug->unit_sell_price}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">السعر الصافي للظرف</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="unit_net_price" value="{{$drug->unit_net_price}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">رقم الترخيص الخاص بالمنتج الدوائي</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lic_palte" value="{{$drug->drug->lic_palte}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">الباركود المحلي</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="local_barcode" value="{{$drug->drug->local_barcode}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">الباركود</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="global_barcode" value="{{$drug->drug->global_barcode}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>


                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">الشركة</label>
                            <div class="col-sm-2">
                                <select name="company_id">

                                    <option value="{{ $drug->drug->company->id }}">{{ $drug->drug->company->name }}</option>

                                </select>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">الصنف</label>
                            <div class="col-sm-2">
                                <select name="category_id">

                                    <option value="{{ $drug->drug->category->id }}">{{ $drug->drug->category->name }}</option>

                                </select>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">الشكل</label>
                            <div class="col-sm-2">
                                <select name="shape_id">

                                    <option value="{{ $drug->drug->shape->id }}">{{ $drug->drug->shape->name }}</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">عدد الوحدات</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="units_number" value="{{$drug->units_number}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">عدد العلب</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="packages_number" value="{{$drug->packages_number}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">تاريخ الانتاج</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="pro_date" value="{{$drug->pro_date}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">تاريخ انتهاء الصلاحية</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="exp_date" value="{{$drug->exp_date}}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-theme">تعديل</button>
                    </form>
                    @endforeach
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