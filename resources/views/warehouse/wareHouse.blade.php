@extends('layouts.master')
 @section('content')
 <section id="main-content">
     <section class="wrapper">

 <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4> <i class="fa fa-angle-left"></i> المستودعات </h4>
                <a type="submit" class="btn btn-theme" href="{{route('warehouse.create')}}" style="margin-right:10px;">إضافة مستودع</a>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> اسم المستودع</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> رقم الهاتف</th>
                    <th><i class="fa fa-bookmark"></i> العنوان</th>
                    <th>البريد الالكتروني</th>
                    <th>الفاكس</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                  @foreach($warehouses as $warehouse)
                    <td>
                    {{$warehouse->name}}
                    </td>

                    <td> {{$warehouse->phone}}</td>
                    <td>{{$warehouse->address}} </td>
                    <td>{{$warehouse->email}}</td>
                    <td>{{$warehouse->fax}}</td>
                    <td>
                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                      <a href="{{route('warehouse.edit', $warehouse->id)}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                      <form class="delete-form" action="{{route('warehouse.destroy', $warehouse->id)}}" method="POST">
                     @csrf
                     @method('DELETE')

                   <button class="btn btn-danger btn-xs" onClick="alert('are you sure')"><i class="fa fa-trash-o "></i></button>
                   </form>
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
