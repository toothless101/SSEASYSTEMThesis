@extends('layout.app')
@section('title', 'PaScan | Report')


@section('content')

@include('partials.sidebar')
<link rel="stylesheet" href="{{asset('css/pages-css/report.css')}}">
<x-header-section>
    Reports
</x-header-section>

<section id="main" class="main">
    <div class="d-flex justify-content-start align-items-center mb-3" style="gap: 10px;">
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search">
            <button class="search-btn">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <div class="filter-container">
            <label for="event-year">Year: </label>
            <select name="" id="event-year">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>

            <label for="event-month">Month: </label>
            <select name="" id="event-month">
                <option value="January">January</option>
                <option value="Febuary">Febuary</option>
                <option value="March">March</option>
                <option value="April">April</option>
            </select>

            <label for="event-day">Day: </label>
            <select name="" id="event-day">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
            </select>
        </div>
    </div>

    <div class="todays-event-name d-flex justify-content-center mt-5">
        <h5 id="event-name">Intramurals 2024</h5>
    </div>

    <div class="event-details-container">
        <div class="event-details d-flex justify-content-around mt-3">
            <div class="details-content column-1">
                <div class="e-item event-date">
                    <h5><span class="label">Date: </span> <span class="date" id="date">12-22-2024</span></h5>
                </div>
                <div class="e-item e-type">
                    <h5><span class="label">Event Type: </span> <span class="event-type" id="event-type">Wholeday</span></h5>
                </div>
            </div>
            <div class="details-content column-2">
                <div class="e-item event-s-time">
                    <h5><span class="label">Event Start Time: </span> <span class="s-time" id="s-time">8:00 AM</span></h5>
                </div>
                <div class="e-item event-e-time">
                    <h5><span class="label">Event End Time: </span> <span class="e-time" id="e-time">5:00 PM</span></h5>
                </div>
            </div>
        </div>

        <hr>
    </div>

    <div class="report-table">
        <table id="student-report_dataTable" class="display">
            <thead>
                <tr>
                    <th rowspan="2">Roll No.</th>
                    <th rowspan="2">Name</th>
                    <th rowspan="2">Department</th>
                    <th rowspan="2">Gr./Yr Level</th>
                    <th rowspan="2">Date</th>
                    <th class="colspan-header" colspan="2">Time In (AM)</th>
                    <th class="colspan-header" colspan="2">Time Out (PM)</th>
                </tr>
                <tr>
                    <!--time IN-->
                    <th class="sub-column"><i class="fa-solid fa-right-to-bracket"></i></th>
                    <th class="sub-column"><i class="fa-solid fa-right-from-bracket"></i></th>

                    <!---Time OUt-->
                    <th class="sub-column"><i class="fa-solid fa-right-to-bracket"></i></th>
                    <th class="sub-column"><i class="fa-solid fa-right-from-bracket"></i></th>
                </tr>
            </thead>

            <tbody id="student-attendance_info">
                <tr>
                    <td>2024001</td>
                    <td>Hilary Mae Poralan</td>
                    <td>College</td>
                    <td>4th Year</td>
                    <td>12-22-2024</td>
                    <td class="sub-column1">07:30</td>
                    <td class="sub-column1">07:30</td>
                    <td class="sub-column1">07:30</td>
                    <td class="sub-column1">12:30</td>
                </tr>
               
                <tr>
                    <td>2024001</td>
                    <td>Hilary Mae Poralan</td>
                    <td>College</td>
                    <td>4th Year</td>
                    <td>12-22-2024</td>
                    <td class="sub-column1">07:30</td>
                    <td class="sub-column1">07:30</td>
                    <td class="sub-column1">07:30</td>
                    <td class="sub-column1">12:30</td>
                </tr>
        
                <tr>
                    <td>2024003</td>
                    <td>Hilary Mae Poralan</td>
                    <td>College</td>
                    <td>4th Year</td>
                    <td>12-22-2024</td>
                    <td class="sub-column1">07:30</td>
                    <td class="sub-column1">07:30</td>
                    <td class="sub-column1">07:30</td>
                    <td class="sub-column1">12:30</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#student-report_dataTable').DataTable({
            dom: 'lt<"d-flex justify-content-between mt-2"<"table-info"i><"table-pagination"p>>r',       
            language: {
                lengthMenu: "Show _MENU_ entries"
            }
        });

        $('.search-input').on('keyup', function(){
            $('#student-report_dataTable').DataTable().search(this.value).draw();
        });
    });
</script>

@endsection



