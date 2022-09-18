<!DOCTYPE html>
<html lang="en">

    @php
        $set = App\Models\Backend\Setting::findOrFail(1);
    @endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{$set->site_title}} - {{$set->tagline}} </title>
    <link rel="icon" href="{{asset('storage/setting/site-icon/'.$set->site_icon)}}" sizes="32x32" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('frontend-assets')}}/assets/css/styles.css">
</head>
  
<body>
    
    @yield('main-section')


    <footer class="text-center py-5">
        <div class="navigation-mobile">
            <div class="navigation-list">
                <a href="{{route('frontend.webview.about.us.list')}}" class="navigation-icon"><i class="bi bi-newspaper"></i> </a>
                <a href="{{route('frontend.webview.view.media.list')}}" class="navigation-icon"><i class="bi bi-images"></i> </a>
                <a href="{{route('frontend.webview.home.index')}}" class="navigation-icon"><i class="bi bi-house-door-fill"></i> </a>
                <a href="tel:{{$set->phone}}" class="navigation-icon"><i class="bi bi-telephone"></i> </a>
                <a href="{{$set->facebook_messenger_url}}" class="navigation-icon" target="_blank"><i class="bi bi-messenger"></i> </a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    
    <script>
        $(document).on('keyup','.search_field',function(){
            var search = $(this).val();
            if(($(this).val().length) < 1){
                $('.search_result').html("");
                return;
            } 
            $.ajax({
                url:"{{route('frontend.webview.main.post.search')}}",
                data:{search:search},
                success:function(response){
                    if(response.status == true)
                    {
                        $('.search_result').html(response.data);
                    }else{
                        $('.search_result').html("");
                    }
                },
            });
        });
        $(document).on('click','.close_search_field',function(){
            var search = $('.search_field').val('');
            $('.search_result').html("");
        });
    </script>
    

</body>

</html>