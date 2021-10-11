<!doctype html>
<html lang="en">
  <head>
    @include('frontend.partials.head')
  </head>
  <body>
    @yield('content')

    

    <!-- Optional JavaScript; choose one of the two! -->
    @include('frontend.partials.footer')

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    @if($alert_toast = Session::get('alert_toast'))

    <!-- jquery -->
    <script src="{{asset('backend/assets/vendor/jquery/js/jquery-3.3.1.min.js')}}"></script>
    <script>
        $.toast({
            heading: "{{$alert_toast['title']}}",
            text: "{{$alert_toast['text']}}",
            showHideTransition: 'fade',
            icon: "{{$alert_toast['type']}}",
            loaderBg: 'rgba(255,255,255,.8)',
            position: 'top-center'
        });
    </script>

    @endif
  </body>
</html>
