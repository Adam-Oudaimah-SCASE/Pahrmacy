@extends('layouts.master')
 @section('content')
 <!--main content start-->
 <section id="main-content">
     <section class="wrapper" dir="rtl">
         <h3><i class="fa fa-angle-right"></i>إضافة صنف</h3>
         <!-- BASIC FORM ELELEMNTS -->
         <div class="row mt" dir="rtl">
             <div class="col-lg-12">
                 <div class="form-panel">
                     <h4 class="mb"><i class="fa fa-angle-right"></i> معلومات </h4>
                     <form class="form-horizontal style-form" action="{{route('category.store')}}" method="POST">
                     {{ csrf_field() }}
                         <div class="form-group" dir="rtl">
                             <label class="col-sm-2 col-sm-2 control-label">الصنف الدوائي</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="name">
                             </div>
                         </div>
                    
                 </div>
                 <button type="submit" class="btn btn-theme">إضافة صنف</button>
             </form>
          
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