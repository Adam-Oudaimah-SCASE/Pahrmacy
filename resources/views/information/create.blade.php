@extends('/layouts.master')
@section('content')
<section id="main-content">
    <section class="wrapper" >
        <h3><i class="fa fa-angle-right"></i>إضافة صيدلية</h3>
        <div class="row mt" >
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb "><i class="fa fa-angle-right"></i>معلومات الصيدلية</h4>
                    <form class="form-horizontal style-form" action="{{ route('information.store') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">اسم الصيدلي</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')"  required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">اسم الصيدلية</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="delegate_name" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">رقم الهاتف</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')"  required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">رقم الترخيص</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="fax" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')"  required>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">العنوان</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')"  required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-theme">إضافة الصيدلية</button>
                </form>
            </div>
        </div>
    </section>
</section>
@endsection
