<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (Session::has('success'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton": true,
    }

    toastr.success("{{ Session::get('success') }}", 'Success!', {
        timeout: 12000
    });

    // toastr.info("{{ Session::get('message') }}");
    // toastr.warning("{{ Session::get('message') }}");
    // toastr.error("{{ Session::get('message') }}");
</script>
@endif

@if (Session::has('error'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton": true,
    }
    toastr.error("{{ Session::get('error') }}", 'Failed!', {
        timeout: 12000
    });
</script>
@endif