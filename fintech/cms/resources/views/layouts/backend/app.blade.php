<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>{{ config('app.name', 'Fintech Admin Panel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome.min.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/ckeditor-content.css')}}"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/ckeditor-classic.css')}}"> -->
    @yield('customstyles')
</head>

<body @if(auth()->user()) class="app sidebar-mini" @endif>
    @if(auth()->user())

        @include('layouts/backend.partials.header')
        @include('layouts/backend.partials.sidebar')
        <main class="app-content">
            @yield('content')
        </main>
    @else
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <h1>{{ config('app.name', 'Fintech Admin Panel') }}</h1>
            </div>
            @yield('content')
        </section>

    @endif
    <!-- Essential javascripts for application to work-->
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('backend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('backend/js/popper.min.js')}}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('backend/js/plugins/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/sweetalert.min.js') }} "></script>
    <script src="https://cdn.ckeditor.com/4.5.11/full-all/ckeditor.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        $('.datePicker').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });
        $('.select2').select2();
        $('.dataTable').DataTable();
        function showNotification(title, msg, icon, type){
            $.notify({
                title: title,
                message: msg,
                icon: icon
            },{
                type: type
            });
        }
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
        @if(session('success'))
            showNotification("Success:- ", "{{session('success')}}", 'fa fa-check', 'success');
        @endif
        @if(session('error'))
            showNotification("Error:- ", "{{session('error')}}", 'fa fa-times', 'danger');
        @endif
        $('.swalBtn').click(function(e){
            let dataset = e.target.parentElement.dataset;
            if(e.target.className == "swalBtn btn btn-danger") dataset = e.target.dataset;
            deleteEl(dataset.href);
        });
        function deleteEl(delUrl) {
            var dataset = delUrl;
            swal({
                title: "Are you sure?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                closeOnConfirm: true
            },function(isConfirm){
                if(!isConfirm) return;
                $.ajax({
                    url: dataset,
                    method: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _method: 'DELETE'
                    },
                    dataType: "html",
                    success: function (response) {
                        if(response.status == 200){
                            swal(response.message, "", response.info);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "", "error");
                    },
                    complete: function(response){
                        location.reload();
                    }
                });
            });
        }

        CKEDITOR.replace('ckeditor', {
            height: 260,
            /* Default CKEditor 4 styles are included as well to avoid copying default styles. */
            contentsCss: [
                "{{ asset('backend/css/ckeditor-content.css')}}",
                "{{ asset('backend/css/ckeditor-classic.css')}}"
            ]
        });

        CKEDITOR.replace('ckeditor_details', {
            height: 260,
            /* Default CKEditor 4 styles are included as well to avoid copying default styles. */
            contentsCss: [
                "{{ asset('backend/css/ckeditor-content.css')}}",
                "{{ asset('backend/css/ckeditor-classic.css')}}"
            ],
        });
    </script>
    @yield('customscripts')
</body>

</html>
