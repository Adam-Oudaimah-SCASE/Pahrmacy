@extends('layouts.master')
 @section('content')
 <section id="main-content">
     <section class="wrapper">
      
 <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> الشركات</h4>
                <a type="submit" class="btn btn-theme" href="/addCompany" style="margin-left:10px;">إضافة شركة</a>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> اسم الشركة</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> رقم الهاتف</th>
                    <th><i class="fa fa-bookmark"></i> العنوان</th>
                    <th><i class=" fa fa-edit"></i> الموقع الالكتروني</th>
                    <th>البريد الالكتروني</th>
                    <th>الفاكس</th>
                  </tr>
                </thead>
                <tbody>
              
                  <tr>
                  @foreach($companies as $company)
                    <td>
                    {{$company->name}}
                    </td>
                    <td> {{$company->phone}}</td>
                    <td>{{$company->address}} </td>
                    <td>{{$company->web_site}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->fax}}</td>
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