@extends('/layouts.master')
@section('content')

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-left"></i>تقرير الأقسام</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4 class="float-right"><i class="fa fa-angle-left "></i>مجموعة الأدوية التابعة ل قسم معين</h4>
          <button type="button" onclick="printFunction()" class="btn btn-theme float-left ml" >طباعة</button>
          <section id="unseen">
          <div class="adv-table">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">


              <thead>
                <tr>
                  <th>اسم الدواء</th>
                  <th>الشركةالمصنعة</th>
                  <th class="numeric" style="width:400px">التكيب الكيميائي</th>
                  <th class="numeric">انتهاء الصلاحية</th>
                  <th class="numeric">العدد الموجود حاليا</th>


                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC</td>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
              </tbody>
            </table>
          </section>
         </div>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-4 -->
    </div>
    <!-- /row -->

    <!-- /row -->
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection
