@extends('layout.app')
@section('title', 'SSEA | Scan QR')
@section('content')

<link rel="stylesheet" href="{{ asset('css/student-officer-css/std_pages.css') }}">

@include('student-officers/stud-partials.std-sidebar')
@include('student-officers/stud-partials.nav-bottom')
<x-header-section>
    Scan QR
</x-header-section>

<section id="main" class="main">
    <div class="container mt-5">
        <div class="row">
            <!-- Scanner Section -->
            <div class="col-md-6">
                <div class="scanner-container">
                    <div class="scanner-box">
                        <!-- Scanner content goes here -->
                    </div>
                </div>
                <p class="instructions">Scan your QR Code to automatically register</p>
            </div>

            <!-- Table Section -->
            <div class="col-md-6">
                <div class="table-container">
                    <h6 class="table-title d-flex justify-content-center">Present Attendees</h6>
                    <table class="attendees-table display" id="attendees-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>2025-01-08</td>
                                <td>09:00 AM</td>
                                <td>12:00 PM</td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>2025-01-08</td>
                                <td>09:30 AM</td>
                                <td>12:15 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
     $(document).ready(function () {
        $('#attendees-table').DataTable({
            dom: '<"d-flex justify-content-between mb-2"<"table-list"l><"table-filter"f>><"table-responsive"t><"d-flex justify-content-between mt-2"<"table-info"i><"table-pagination"p>>r',
            language: {
                lengthMenu: "Show _MENU_ entries"
            }
        });

        $('.search-input').on('keyup', function(){
            $('#attendees-table').DataTable().search(this.value).draw();
        });

    });
</script>
@endsection