@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Sorted Out')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="dataTables table">
                        <thead class="text-center">
                            <tr>
                                <th><strong> # </strong> </th>
                                <th><strong> Recipient 1 </strong></th>
                                <th><strong> Location 1 </strong></th>
                                <th><strong> Recipient 2 </strong></th>
                                <th><strong> Location 2 </strong> </th>
                                <th><strong> Recipient 3 </strong></th>
                                <th><strong> Location 3 </strong></th>


                                <th><strong> Date Received </strong></th>
                                <th><strong> Date Shipped </strong></th>
                                <th><strong> Status </strong></th>
                                <th><strong> Action </strong></th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> 1 </td>
                                <td>
                                    <h6 class="mb-1">Name</h6>
                                    <p class="text-muted mb-0">Phone #</p>
                                </td>
                                <td>
                                    <h6 class="mb-1">Commonwealth Shit</h6>
                                </td>
                                <td> </td>

                                <td> </td>
                                <td> </td>
                                <td></td>
                                <td> </td>
                                <td></td>
                                <td>

                                </td>
                                <td><a class="btn btn-sm btn-primary badge" href="{{ route('add.schedule}">Schedule</a></td>


                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
