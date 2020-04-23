@extends('layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right mr"></i>اختر نوع التقرير </h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <br>
                    <form class="form-horizontal style-form" action="{{ route('report.filter') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group" dir="rtl">
                          <label class="col-sm-2 col-sm-2 control-label">نوع التقرير</label>
                          <div class="col-sm-10" id="styled-select">
                              <select class="form-control" name="type">
                                  <option value="1">تقرير الشركات</option>
                                  <option  value="2">تقرير مبيعات الشركات</option>
                                  <option value="3">تقرير المبيعات اليومية</option>
                                  <option value="4">تقرير الميزانية و الأرباح</option>
                                  <option value="5">تقرير المصاريف</option>
                                  <option value="6">تقرير المشتريات</option>
                                  <option value="7">تقرير كميات الأدوية منتهية الصلاحية</option>
                                  <option value="8">تقرير طلبيات المستودع</option>
                              </select>
                          </div>
                        </div>

                        <div class="form-group optional referral" dir="rtl" style="display:none;">
                          <label class="col-sm-2 col-sm-2 control-label">تاريخ البداية</label>
                          <div class="col-sm-4">
                            <input type="date" class="form-control" name="start-date" oninvalid="this.setCustomValidity("هذا الحقل إلزامي")" onchange="this.setCustomValidity("")"  required>
                          </div>
                          <label class="col-sm-2 col-sm-2 control-label">تاريخ النهاية</label>
                          <div class="col-sm-4">
                            <input type="date" class="form-control" name="end-date"oninvalid="this.setCustomValidity("هذا الحقل إلزامي")" onchange="this.setCustomValidity("")"  required>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-theme">عرض التقرير</button>
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
@section('scripts')
<script>
$("select").change(function () {
    // hide all optional elements
    $('.optional').css('display','none');

    $("select option:selected").each(function () {
        if($(this).val() == "2"||$(this).val() == "4") {
            $('.referral').css('display','block');
        }
    });
});
</script>
@endsection
