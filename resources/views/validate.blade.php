{{-- @if( $errors -> any())
    <p class="alert alert-danger">{{ $errors -> first() }}<button class="close" data-dismiss="alert">&times;</button></p>
@endif

@if (Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
@endif --}}

@if( $errors -> any() )

   <script>
       swal("Validation Error !!", "{{ $errors -> first() }}", "warning");
   </script>

@endif


@if( Session::has('success') )

    <script>
       swal("Good Job!", "{{ Session::get('success') }}", "success");
   </script>

@endif
