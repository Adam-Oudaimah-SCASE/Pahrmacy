@extends('/layouts.master')
@section('content')

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-left"></i>تقرير المصاريف</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4 class="float-right"><i class="fa fa-angle-left"></i>يقوم بعرض كل التفاصيل الخاصة بالمصاريف المدفوعة خلال مدة معينة</h4>
                    <button type="button" onclick="printFunction()" class="btn btn-theme float-left ml">طباعة</button>
                    <section id="unseen">
                        <div class="">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="">
                                <thead>
                                    <tr>
                                        <th>اسم المصروف</th>
                                        <th class="numeric">سبب المصروف</th>
                                        <th class="numeric">القيمة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                                        <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                                        <td class="numeric">9</td>
                                    </tr>
                                    <tr colspan="1" rowspan="4">
                                        <td class="text-left"><strong>مجموع المصاريف</strong></td>
                                        <td class="text-left">$1029.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <!-- /content-panel -->
            </div>
            <!-- /col-lg-4 -->
        </div>
        <!-- /row -->
    </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection
