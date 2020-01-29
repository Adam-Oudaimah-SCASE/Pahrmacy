@extends('layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper" dir="rtl">
        <h3><i class="fa fa-angle-right"></i>تعديل صنف</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> معلومات الصنف الدوائي</h4>
                    <form action="{{route('category.update', $category->id )}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">الصنف الدوائي</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{$category->name}}">
                            </div>
                        </div>

              
                <button type="submit" class="btn btn-theme"> تعديل</button>
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