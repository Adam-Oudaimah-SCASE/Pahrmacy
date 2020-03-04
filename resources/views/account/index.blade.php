@extends('layouts.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <h4><i class="fa fa-angle-left"></i> أنواع الحسابات</h4>
                        <a type="submit" class="btn btn-theme" href="{{route('accountType.create')}}" style="margin-right:10px;">إضافة صنف جديد</a>
                        <hr>
                        <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i>  نوع الحساب</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($types as $types)
                                <td>
                                    {{$types->name}}
                                </td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <a href="{{route('accountType.edit', $types->id)}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    <form class="delete-form" action="{{route('accountType.destroy', $types->id)}}" method="POST">
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
            </div>
        </div>
    </section>
</section>
@endsection
