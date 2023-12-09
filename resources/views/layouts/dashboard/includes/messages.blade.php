
@if (session('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}"
        })
    </script>
@endif

@if (session('errors'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('errors') }}"
        })
    </script>
@endif
