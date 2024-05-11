<script>  
    @if(Session::has('success'))  
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get("success") }}',
            showConfirmButton: false,
            timer: 1500
        });
    @endif   
    @if(Session::has('error'))  
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '{{ Session::get("error") }}',
            showConfirmButton: false,
            timer: 1500
        });
    @endif  
</script>