@extends('layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-left mr"></i>تعديل دواء</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-left mr"></i>معلومات الدواء</h4>
                    <form class="form-horizontal style-form" action="{{ route('drug.updateDrug', $drugs->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group " dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">الاسم العربي</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name_arabic" value="{{ $drugs->name_arabic }}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>

                            <label class="col-sm-2 col-sm-2 control-label">الاسم الانكليزي</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name_english" value="{{ $drugs->name_english }}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">التركيبة الكيميائية</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" value="{{ $drugs->chemical_composition }}" name="chemical_composition"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">حجم العبوة </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="volume_unit" value="{{ $drugs->volume_unit }}" />
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">رقم الترخيص الخاص بالمنتج الدوائي</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lic_palte" value="{{ $drugs->lic_palte }}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>

                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">الباركود المحلي</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="local_barcode" value="{{ $drugs->local_barcode }}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">الباركود</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="global_barcode" value="{{ $drugs->global_barcode }}" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">الشركة</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="company_id">

                                    <option value="{{ $drugs->company->id }}">{{ $drugs->company->name }}</option>

                                </select>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">الصنف</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="category_id">

                                    <option value="{{ $drugs->category->id }}}">{{ $drugs->category->name }}</option>

                                </select>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">الشكل</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="shape_id">

                                    <option value="{{ $drugs->shape->id }}">{{ $drugs->shape->name }}</option>

                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-theme">تعديل</button>
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
