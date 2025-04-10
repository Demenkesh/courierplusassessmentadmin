{{-- <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('layouts.admin')
@section('title')
    User History
@endsection
@section('content')
    <div class=" py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> All Tenants Admin User
                            <a href="#" class="float-end btn btn-success btn-sm">
                                User
                            </a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">


                        <table id="example1" class="display ">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Tenant_id</th>
                                    <th>Approved</th>
                                    <th>Doamin</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-4">
                                    {{-- {{ $users->links() }} --}}
                                </div>
                                @forelse ($users as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->tenant_id }}</td>
                                        <td>{{ $item->verified_by_admin }}</td>
                                        @foreach ($item->tenants as $tenant)
                                            @foreach ($tenant->domains as $domain)
                                                <td>{{ $domain->domain }}</td>
                                            @endforeach
                                        @endforeach
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary approve-user"
                                                data-id="{{ $item->id }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Numbers</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            alert("Do you want to view this numbers!");
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
        });
        // $(document).ready(function() {
        //     $('#example1').DataTable();
        // });
    </script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #c0bfbf !important;
        }
    </style>


    <script>
        // Trigger the approval process
        $(document).on('click', '.approve-user', function(e) {
            e.preventDefault();

            var userId = $(this).data('id'); // Get the user ID from the data-id attribute

            // Send the AJAX request
            $.ajax({
                url: "{{ url('admin/approve-user') }}/" + userId, // URL to the controller method
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}" // CSRF token for security
                },
                success: function(response) {
                    // On success, you can display a success message or update the UI
                    if (response.status) {
                        alert(response.message); // Show the success message
                        location.reload(); // Optionally reload the page
                    }
                },
                error: function() {
                    alert("An error occurred. Please try again.");
                }
            });
        });
    </script>

@endsection
