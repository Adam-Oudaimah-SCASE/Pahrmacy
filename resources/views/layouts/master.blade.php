<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>برنامج إدارة الصيدليات</title>

        <!-- Favicons -->
        <link href="/img/favicon.png" rel="icon">
        <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="/fonts/Droid Sans Arabic.ttf">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <!--external css-->
        <link href="/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!--datatable-->
        <link href="/lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
        <link href="/lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
        <link rel="stylesheet" href="/lib/advanced-datatable/css/DT_bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="/lib/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="/lib/bootstrap-daterangepicker/daterangepicker.css" />
        <!-- Custom styles for this template -->
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/style-responsive.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="/lib/jquery/jquery.min.js"></script>
        <script src="https://cdn.rtlcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="/lib/jquery.dcjqaccordion.2.7.js"></script>
        <script src="/lib/jquery.scrollTo.min.js"></script>
        <script src="/lib/jquery.nicescroll.js" type="text/javascript"></script>
        <script type="text/javascript" language="javascript" src="/lib/advanced-datatable/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="/lib/advanced-datatable/js/DT_bootstrap.js"></script>
        <!--script for this page-->
        <script src="/lib/jquery-ui-1.9.2.custom.min.js"></script>
        <!--custom switch-->
        <script src="/lib/bootstrap-switch.js"></script>
        <!--custom tagsinput-->
        <script src="/lib/jquery.tagsinput.js"></script>
        <!--custom checkbox & radio-->
        <script type="text/javascript" src="/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="/lib/bootstrap-daterangepicker/date.js"></script>
        <script type="text/javascript" src="/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="/lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="/lib/form-component.js"></script>

        <!-- Custom Scripts -->
        @yield('custom-cdns')
    </head>
    <body dir="rtl">
        @include('layouts.header')
        <section id="container">
            @yield('content')
        </section>
        @include('layouts.footer')
        <!-- Custom Scripts -->
        @yield('scripts')
          <!--common script for all pages-->
          <script src="/lib/common-scripts.js"></script>
    </body>
</html>
