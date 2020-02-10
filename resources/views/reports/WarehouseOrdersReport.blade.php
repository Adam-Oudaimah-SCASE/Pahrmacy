@extends('/layouts.master')
@section('content')

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-left"></i>تقرير طلبيات مستودع</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4 class="float-right"><i class="fa fa-angle-left"></i>يعرض مجموعة الطلبيات من المستودع خلال مدة زمنية معينة </h4>
            <button type="button" onclick="printFunction()" class="btn btn-theme float-left ml" >طباعة</button>
          <section id="unseen">
          <div class="adv-table">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">


              <thead>
                <tr>
                  <th>اسم المستودع</h>
                  <th class="numeric">تاريخ الطلبية</th>
                  <th class="numeric">مجموع الطلبية</th>


                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
                  <td class="numeric">11-12-2020</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AAC AUSTRALIAN AGRICULTURAL</td>
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
