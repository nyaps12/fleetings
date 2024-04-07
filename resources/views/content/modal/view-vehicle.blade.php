<div class="modal fade" id="viewVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Vehicle Information</h3>
                </div>
                <form id="viewVehicleForm" class="row g-3">
                    <div class="row">

                        <!-- Image element to display the vehicle image -->
                        <img id="vehicleImage" src="" alt="" style="width: 200px; height: auto;">

                        <div class="col-md-6">
                            <p id="vehicleId"></p>
                            <p id="engineNumber"></p>
                            <p id="chassisNumber"></p>
                        </div>
                    </div>
                    {{-- <div class="col-12 text-end">
                        <button type="button" class="btn btn-label-secondary btn-md btn-reset badge"
                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to populate modal content and open the modal
    function populateModal(response) {
        // Extract the vehicle data from the response
        var driver = response.driver;

        if (!driver || !driver.profile_photo_path) {
            console.error('Vehicle data is invalid or incomplete:', driver);
            return;
        }

        // Set the image source
        document.getElementById('vehicleImage').src = driver.profile_photo_path;

        document.getElementById('vehicleId').innerText = 'Vehicle ID: ' + driver.vehicle_id;
        document.getElementById('engineNumber').innerText = 'Engine Number: ' + driver.engine_number;
        document.getElementById('chassisNumber').innerText = 'Chassis Number: ' + driver.chassis_number;

        // Open the modal
        var modal = new bootstrap.Modal(document.getElementById('viewVehicleModal'));
        modal.show();
    }

    // Event listener for the button click
    document.querySelectorAll('.view-vehicle-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            // Retrieve the vehicle ID from the button's data attribute
            var vehicleId = this.getAttribute('data-vehicle-id');

            // Make an AJAX request to fetch the vehicle data based on the ID
            fetch('http://127.0.0.1:8000/api/vehicle/' + vehicleId)
                .then(response => {
                    // Check if response is successful (status code 200-299)
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Parse JSON response
                })
                .then(response => {
                    // Populate the modal with the fetched vehicle data
                    populateModal(response);
                })
                .catch(error => {
                    console.error('Error fetching vehicle data:', error);
                });
        });
    });
</script>
