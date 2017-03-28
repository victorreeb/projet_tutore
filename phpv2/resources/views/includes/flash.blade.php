@if(session('success'))
  <script> Materialize.toast('<i class="large material-icons">info_outline</i>{{ session("success") }}', 8000, 'green rounded') </script>
@endif
@if(session('error'))
  <script> Materialize.toast('<i class="large material-icons">info_outline</i>{{ session("error") }}', 8000, 'red rounded') </script>
@endif
@if(session('info'))
  <script> Materialize.toast('<i class="large material-icons">info_outline</i>{{ session("info") }}', 8000, 'blue rounded') </script>
@endif
@if(session('warning'))
  <script> Materialize.toast('<i class="large material-icons">info_outline</i>{{ session("warning") }}', 8000, 'amber rounded') </script>
@endif
