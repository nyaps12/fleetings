@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Order')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Order</title>
    </head>

    <body>

        <div class="container mt-5">
            <h2 class="text-center">Orders List</h2>

            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th scope="col" class="text-center">Sender</th>
                                <th scope="col" class="text-center">Receiver</th>
                                <th scope="col" class="text-center">Items</th>
                                <th scope="col" class="text-center">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-1">Name</h6>
                                    <p class="text-muted mb-0">Location</p>
                                </td>
                                <td class="text-center">
                                    <h6 class="mb-1">Name</h6>
                                    <p class="text-muted mb-0">Location</p>
                                </td>
                                <td class="text-center">dildo</td>
                                <td class="text-center">1m</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </html>

@endsection
