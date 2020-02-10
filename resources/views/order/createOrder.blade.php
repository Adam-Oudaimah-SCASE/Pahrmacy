@extends('layouts.master')
@section('content')

	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<section id="main-content">
    <section class="wrapper" >
        <h3><i class="fa fa-angle-right"></i>إضافة طلبية</h3>
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> معلومات </h4>
                    <form class="form-horizontal style-form" action="/saveOrder">
                    {{ csrf_field() }}
                    <div class="form-group" dir="rtl">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="invoice_type_id" value="2">
                            </div>
                        </div>
                    <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">تاريخ الطلبية </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="exp_date">
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> الشركة </label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="supplier_id">  
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> المستودع </label>
                            <div class="col-sm-10">
                             

                            </div>
                        </div>
                        <div class="form-group" dir="rtl" id="dynamic_field">
                            <label class="col-sm-2 col-sm-2 control-label"> اسم الدواء</label>
                            <div class="col-sm-10">
                                <input type="text" id="drug_name" class="form-control" name="name_arabic" autofocus> 
                            </div>
                            
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> عدد الوحدات</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="unit_number"> 
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label"> عدد العلب</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="packages_number"> 
                            </div>
                        </div>
                        <button type="submit" class="btn btn-theme">إضافة طلبية</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<!--<script>
$(document).ready(function(){
	var i=1;
	$('#drug_name').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" id="drug_name" class="form-control" name="name_arabic" autofocus></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	
	
});
</script>-->
@endsection
