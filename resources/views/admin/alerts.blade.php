@if(session()->has('message'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session()->get('message') }}',
            showConfirmButton: false,
            timer: 3500
          })
    });
</script>
@endif 
@if(session()->has('warning'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
          Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: '{{ session()->get('warning') }}',
            showConfirmButton: false,
            timer: 3500
          })
    });
</script>
@endif
