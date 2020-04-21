@extends('layouts.master')
@section('content')
<section id="main-content">
  <section class="wrapper">

    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h3 class="mr"><i class="fa fa-angle-left"></i>الأدوية</h4>
              <a type="submit" class="btn btn-theme mr " href="{{ route('drug.create' )}}">إضافة دواء</a>
              <hr>
              <thead>
                <tr>
                  <th><i class="fa fa-bullhorn ml "></i>الاسم العربي</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle ml"></i>الاسم الانكليزي</th>
                  <th><i class="fa fa-bookmark ml "></i>التركيبة الكيميائية</th>
                  <th><i class=" fa fa-edit ml"></i>حجم العبوة</th>
                  <th>رقم الترخيص</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach($drugs as $drug)
                  <td>{{ $drug->name_arabic }}</td>
                  <td>{{ $drug->name_english }}</td>
                  <td>{{ $drug->chemical_composition }}</td>
                  <td>{{ $drug->volume_unit }}</td>
                  <td>{{ $drug->lic_palte }}</td>
                  <td>
                    <button class="btn btn-success btn-xs" onclick="window.location.href = '{{ route('drug.show', $drug->id) }}'"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-primary btn-xs" onclick="window.location.href = '{{ route('drug.editDrug', $drug->id) }}'"><i class="fa fa-pencil"></i></button>
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
