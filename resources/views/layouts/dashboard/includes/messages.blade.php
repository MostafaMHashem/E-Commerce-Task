
@if (session('success'))
    <script>
        swal({
            position: 'center',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
@endif
@if (session('error'))
    <script>
        swal({
            icon: 'error',
            title: 'Oops...',
            text: `{{ session('error') }}`, // Convert errors to JSON
        });
    </script>
@endif

@if (session('errors'))
    <script>
        swal({
            icon: 'error',
            title: 'Oops...',
            text: `{{ session('errors') }}`, // Convert errors to JSON
        });
    </script>
@endif
