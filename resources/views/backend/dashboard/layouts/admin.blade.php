<!DOCTYPE html>
<html lang="en" class="semi-dark">
    @php
        $settingDash = App\Models\Backend\Setting::find(1);
    @endphp
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- loader->
        <link href="assets/css/pace.min.css" rel="stylesheet" />
        <script src="assets/js/pace.min.js"></script-->
        
        <link rel="shortcut icon" href="{{asset('storage/setting/site-icon/'.$settingDash->site_icon)}}" type="image/x-icon" />
 
        <!--plugins-->
        <link href="{{asset('mastering-assets')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <link href="{{asset('mastering-assets')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
        <link href="{{asset('mastering-assets')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        <link href="{{asset('mastering-assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

        <!-- CSS Files -->
        <link href="{{asset('mastering-assets')}}/css/bootstrap.min.css" rel="stylesheet" />
        <link href="{{asset('mastering-assets')}}/css/bootstrap-extended.css" rel="stylesheet" />
        <link href="{{asset('mastering-assets')}}/css/style.css" rel="stylesheet" />
        <link href="{{asset('mastering-assets')}}/css/icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />

        <!-- CSS RichtextEditor -->
        <link href="{{asset('mastering-assets')}}/plugins/richtexteditor/rte_theme_default.css" rel="stylesheet"  />

        <!--Theme Styles-->
        <link href="{{asset('mastering-assets')}}/css/semi-dark.css" rel="stylesheet" />

        <title>{{$settingDash->site_title}} - {{$settingDash->tagline}} </title>

        <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    
    </head>

    <body>
        <!--start wrapper-->
        <div class="wrapper">
            <!--start sidebar -->
                @include('backend.dashboard.includes.sidebar')
            <!--end sidebar -->

            <!--start top header-->
            @include('backend.dashboard.includes.header')
            <!--end top header-->

                        
            @yield('content')
            
            
            @include('backend.dashboard.includes.footer')
        </div>
        <!--end wrapper-->

        <!-- JS Files-->
        <script src="{{asset('mastering-assets')}}/js/jquery.min.js"></script>
        <script src="{{asset('mastering-assets')}}/plugins/simplebar/js/simplebar.min.js"></script>
        <!-- sidbarmenuscrool-->
        <script src="{{asset('mastering-assets')}}/plugins/metismenu/js/metisMenu.min.js"></script>
        <!-- sidbarmenuscrool-->
        <script src="{{asset('mastering-assets')}}/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <!--plugins-->
        <script src="{{asset('mastering-assets')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="{{asset('mastering-assets')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('mastering-assets')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
        <script src="{{asset('mastering-assets')}}/js/table-datatable.js"></script>

        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
             $('.summernote').summernote({
                   height: 300,
              });
           });
        </script>


        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    fixedHeader: true
                } );
            } );
            $(document).ready(function() {
                var table = $('#post-all').DataTable( {
                    fixedHeader: true
                } );
            } );
            $(document).ready(function() {
                var table = $('#post-published').DataTable( {
                    fixedHeader: true
                } );
            } );
            $(document).ready(function() {
                var table = $('#post-draft').DataTable( {
                    fixedHeader: true
                } );
            } );
            $(document).ready(function() {
                var table = $('#post-pending').DataTable( {
                    fixedHeader: true
                } );
            } );
        </script>

        <!-- RichtextEditor -->
        <script src="{{asset('mastering-assets')}}/plugins/richtexteditor/rte.js"></script>
        <script>
			var editor1 = new RichTextEditor("#div_editor1");
			
			function btngetHTMLCode() {
				alert(editor1.getHTMLCode())
			}

			function btnsetHTMLCode() {
				editor1.setHTMLCode("<h1>editor1.setHTMLCode() sample</h1><p>You clicked the setHTMLCode button at " + new Date() + "</p>")
			}
			function btngetPlainText() {
				alert(editor1.getPlainText())
			}

		</script> 

        <!-- Display Uploaded Image-->
        <script>
            function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah')
                                .attr('src', e.target.result)
                                .width("100%")
                                .height("100%");
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
        </script>
        
        <!-- Notificationmenuscrool-->
        <!-- <script src="{{asset('mastering-assets')}}/js/index.js"></script> -->
        <!-- Main JS-->
        <script src="{{asset('mastering-assets')}}/js/main.js"></script>

        <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        </script>
        @stack('js')
    </body>
</html>
