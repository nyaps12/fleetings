{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
@endif --}}

{{-- <div class="container" style="z-index: 100;">
    <x-notify::notify />
  </div> --}}

<style>
.notification {
    position: fixed;
    top: 80px; /* Adjust the distance from the top as needed */
    right: 30px; /* Adjust the distance from the right as needed */
    background-color: #4CAF50; /* Green background color */
    color: white; /* White text color */
    padding: 20px; /* Padding around the text */
    border-radius: 5px; /* Rounded corners */
    z-index: 100; /* Ensure the notification appears above other content */
    display: none; /* Initially hide the notification */
    width: 300px; /* Adjust the width as needed */
}


.notification.show {
    display: block; /* Show the notification when the 'show' class is applied */
}

.notification .message {
    font-size: 16px; /* Adjust the font size as needed */
}

/* Close button styles */
.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
    outline: none;
}

.close-btn:hover {
    color: lightgray; /* Change color on hover */
}

/* Error notification styles */
.error {
    background-color: #FF5733; /* Red background color */
}

.error .message {
    font-size: 16px; /* Adjust the font size as needed */
}

.error .close-btn {
    color: white; /* Set close button color for error notification */
}

.error .close-btn:hover {
    color: lightgray; /* Change close button color on hover */
}


</style>