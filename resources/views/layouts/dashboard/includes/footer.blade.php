</main>


<!-- main js -->

<script src="{{ asset('dashboardAssets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('dashboardAssets/js/all.min.js') }}"></script>
<script src="{{ asset('dashboardAssets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboardAssets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('dashboardAssets/js/main.js') }}"></script>
<!-- main js -->
<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- sweet alert -->

@include('layouts.dashboard.includes.messages')

@yield('script')

<script>
    function acceptLogoutAlert() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        swal({
            title: "{{ __('messages.areyousurelogout') }}",
            icon: 'warning',
            position: 'center',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            console.log('entered then');

            if (result) {
                console.log('entered if');

                $.ajax({
                url: `{{ route('admin.auth.signOut') }}`,
                type: 'GET',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },


            }).done(function(result) {
                // $('.selectpicker').selectpicker('refresh');
                location.reload;
                `{{ route('admin.auth.signIn') }}`
            }).fail(function(result) {
                // $('.case_container').html(result);
                alert('failed')
            });
            }
        });
    }
</script>



</body>

</html>
