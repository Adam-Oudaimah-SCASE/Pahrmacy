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
                    <form class="form-horizontal style-form" action="" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group" dir="rtl">
                          <label class="col-sm-2 col-sm-2 control-label">نوع التقرير</label>
                          <div class="col-sm-10">
                              <select class="form-control" name="report-type">
                                  <option value="">تقرير الأصناف</option>
                                  <option value="">تقرير مبيعات الأصناف</option>
                                  <option value="">تقرير الشركات</option>
                                  <option value="">تقرير مبيعات الشركات</option>
                                  <option value="">تقرير المبيعات اليومية</option>
                                  <option value="">تقرير الميزانية و الأرباح</option>
                                  <option value="">تقرير المصاريف</option>
                                  <option value="">تقرير المشتريات</option>
                                  <option value="">تقرير كميات الأدوية منتهية الصلاحية</option>
                                  <option value="">تقرير طلبيات المستودع</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">تاريخ البداية</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="start-date" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')"  required>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">تاريخ النهاية</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="end-date" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')"  required>
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
