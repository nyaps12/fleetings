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
                        <div class="col-12">
                            @foreach ($vehicle as $vehicles)
                                <img src="{{ asset($vehicles->profile_photo_path) }}" alt="Vehicle Photo"
                                    id="vehicleImage-{{ $vehicles->id }}">
                            @endforeach
                            <p id="vehicleId"></p>
                            <p id="vehicleBrand"></p>
                            <p id="vehicleYearModel"></p>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-label-secondary btn-md btn-reset badge"
                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to populate modal content and open the modal
    function populateModal(vehicle) {

        document.getElementById('vehicleId').innerText = 'Vehicle ID: ' + vehicle.id;
        document.getElementById('vehicleBrand').innerText = 'Brand: ' + vehicle.vehicle_brand;
        document.getElementById('vehicleYearModel').innerText = 'Year Model: ' + vehicle.year_model;

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
            // Replace the following lines with your AJAX request implementation
            var vehicle = {
                id: vehicleId,
                vehicle_brand: 'Example Brand',
                year_model: '2022'
                // Add more properties as needed
            };

            // Populate the modal with the fetched vehicle data
            populateModal(vehicle);
        });
    });
</script>
