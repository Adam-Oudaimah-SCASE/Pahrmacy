@extends('layouts.master')
 @section('content')
 <section id="main-content">
     <section class="wrapper">

 <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> الأشكال</h4>
                <a type="submit" class="btn btn-theme" href="/addShape" style="margin-right:10px;">إضافة شكل</a>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> الشكل</th>

                  </tr>
                </thead>
                <tbody>

                  <tr>
                  @foreach($shapes as $shape)
                    <td>
                    {{$shape->name}}
                    </td>


                    <td>
                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                    </td>
                  </tr>
                  @endforeach




                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>


        </section>
     <!-- /wrapper -->
 </section>
 <!-- /MAIN CONTENT -->
 <!--main content end-->





 @endsection
