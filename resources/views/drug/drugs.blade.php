@extends('layouts.master')
 @section('content')
 <section id="main-content">
     <section class="wrapper">
      
 <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-left"></i> الأدوية</h4>
                <a type="submit" class="btn btn-theme" href="{{route('drugs.create')}}" style="margin-right:10px;"> إضافة دواء</a>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> الدواء</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> الاسم الانكليزي </th>
                    <th><i class="fa fa-bookmark"></i> التركيبة الكيميائية</th>
                    <th><i class=" fa fa-edit"></i>حجم العبوة</th>
                
                  
                  </tr>
                </thead>
                <tbody>
              
                  <tr>
                  @foreach($drugs as $drug)
                   
                    <td> {{$drug->name_arabic}}</td>
                    <td>
                    {{$drug->name_english}}
                    </td>
                    <td>{{$drug->chemical_composition}} </td>
                    <td>{{$drug->volume_unit}}</td>
                
                
                 
                  
                  
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