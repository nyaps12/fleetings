<!-- Edit User Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">

                    <img src="{{ asset('assets/img/vehicle/accident.jpg') }}" alt=""
                        style="width: 300px; height: auto;">

                    @foreach ($incidents as $incident)
                        @if ($incident->id == 1)
                            <div class="col-md-6">
                                <h2>Other Driver Details</h2>
                                <h5>Driver Name: {{ $incident->other_name }}</h5>
                                <h5>Vehicle Type: {{ $incident->vehicle }}</h5>
                                <h5>Contact Number: {{ $incident->number }}</h5>
                                <h5>Address: {{ $incident->other_address }}</h5>
                            </div>
                        @break

                        {{-- Stop the loop after finding the incident with ID 1 --}}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<!--/ Edit User Modal -->
