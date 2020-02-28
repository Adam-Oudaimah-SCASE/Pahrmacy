@extends('layouts.master')
 @section('content')
 <section id="main-content">
     <section class="wrapper">

 <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h3 class="mr"><i class="fa fa-angle-left"></i> المصروف</h4>
                <a type="submit" class="btn btn-theme mr " href="{{ route('.create' )}}" >إضافة المصروف</a>
                <hr>
                <thead>
                  <tr>
                    <th ><i class="fa fa-bullhorn ml "></i> الوصف</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle ml"></i>السعر</th>
                    <th><i class="fa fa-bookmark ml "></i>التاريخ</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                  @foreach($expenses as $e)
                    <td> {{ $e->desc }}</td>
                    <td>
                    {{ $e->amount }}
                    </td>
                    <td>{{ $e->date }}</td>

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
