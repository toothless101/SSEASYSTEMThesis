@extends('layout.app')
@section('title', 'SSEA | Officers')

@section('content')

<link rel="stylesheet" href="{{ asset('css/pages-css/officers.css') }}">
@include('partials.sidebar')
<x-header-section>
    Officers
</x-header-section>

    <section id="main" class="main">
       
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- New Officer Button -->
            <button class="btn btn-new-officer" data-bs-toggle="modal" data-bs-target="#addOfficerModal">
                + New Officer
            </button>

        
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search">
                <button class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <div class="officer-table mt-5">
            <table id="officer-datatable" class="display">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody id="assigned_officer">
                @foreach ($users as $key => $user) <!--$user variable--->
                    <tr>
                        <td>{{ ++$key}}</td>
                        <td><img src="/images/{{ $user->user_img}}" style="width: 50px; height: 50px; border-radius: 50px"></td>
                        <td id="name-clm">{{ $user->name}}</td>
                        <td>{{ $user->email}} </td>
                        <td>@if($user->usertype == 1)
                                Admin
                            @elseif($user->usertype == 2)
                                Student Officer
                            @else
                            Unknown
                            @endif
                        </td>
                        
                        <td>
                                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#editOfficerModal{{$user->id}}">
                                    <i class="bi bi-pencil-fill" style="color: #550000;"></i>
                                </a>
                        </td>    

                        <td>Assigned </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        </div>
        <!--TABLE-->
        
        


    </section>
    
@include('admin.posts.officer-modals.add-officer-modal') 
@include('admin.posts.officer-modals.edit-officers') 

    

<script>
    $(document).ready(function(){
        $('#officer-datatable').DataTable({
            dom: 'lt<"d-flex justify-content-between mt-2"<"table-info"i><"table-pagination"p>>r', 
            language:{
                lengthMenu: "Show _MENU_ entries"
            }      
        });

        $('.search-input').on('keyup', function(){
            $('#officer-datatable').DataTable().search(this.value).draw();
        });
    });
</script>
@endsection


