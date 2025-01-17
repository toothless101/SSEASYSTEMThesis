@extends('layout.app')
@section('title', 'SSEA | Event')

@section('content')

<link rel="stylesheet" href="{{ asset('css/pages-css/event.css') }}">

@include('partials.sidebar')

<x-header-section>
    Event
</x-header-section>

<section id="main" class="main">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- New Officer Button -->
        <button class="btn btn-new-event" data-bs-toggle="modal" data-bs-target="#addEventModal">
            + New Event
        </button>

        <div class="search-container">
            <input 
                type="text" 
                class="search-input" 
                placeholder="Search"
                id="search_bar"
            >
            <button class="search-btn">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    <!--TABLE-->
        <table id="eventdataTable" class="display">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Event Name</th>
                    <th>Details</th>
                    <th>Officer Assigned</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="event-list">
                <tr>
                    <td>1</td>
                    <td>Intramurals</td>
                    <td>Description</td>
                    <td>Officer Name</td>
                    <td>Ongoing</td>
                    <td><a href="" class="" data-bs-toggle="modal" data-bs-target="#editEventModal">
                        <i class="bi bi-pencil-fill" style="color: #550000;"></i>
                    </a></td>
                </tr>
            </tbody>
        </table> 
</section>

@include('admin.posts.event-modals.create-new-event-modal')
@include('admin.posts.event-modals.edit-events')


<script>
    $(document).ready(function () {
        $('#eventdataTable').DataTable({
            dom: 'lt<"d-flex justify-content-between mt-2"<"table-info"i><"table-pagination"p>>r',
            language: {
                lengthMenu: "Show _MENU_ entries"
            }
        });

        $('.search-input').on('keyup', function(){
            $('#eventdataTable').DataTable().search(this.value).draw();
        });

    });
</script>

@endsection
