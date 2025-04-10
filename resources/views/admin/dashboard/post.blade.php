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
                        <h4 class="text-white"> All Tenants Posts
                            <a href="#" class="float-end btn btn-success btn-sm">
                                Post
                            </a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">


                        <table id="example1" class="display ">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>User</th>
                                    <th>Tenants</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-4">
                                    {{-- {{ $users->links() }} --}}
                                </div>
                                @forelse ($posts as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ \Str::limit($item->content, 10, '...') }}</td>

                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->tenant_id }}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary approve-user"
                                                data-id="{{ $item->id }}">
                                                <i class="fa-solid fa-eye"></i> View
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


    <!-- Modal Structure -->
    <div class="modal fade" id="viewPostModal" tabindex="-1" aria-labelledby="viewPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPostModalLabel">Post Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Post details will be dynamically populated here -->
                    <div id="post-details">
                        <p><strong>Title:</strong> <span id="post-title"></span></p>
                        <p><strong>Content:</strong> <span id="post-content"
                                style="white-space: normal; word-wrap: break-word;"></span></p>
                        <p><strong>User:</strong> <span id="post-user"></span></p>
                        <p><strong>Tenant ID:</strong> <span id="post-tenant-id"></span></p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.approve-user', function(e) {
            e.preventDefault();

            var postId = $(this).data('id'); // Get the post ID from the data-id attribute

            // Send the AJAX request to get the post details
            $.ajax({
                url: "{{ url('admin/get-post-details') }}/" + postId, // URL to fetch the post details
                method: "GET",
                success: function(response) {
                    if (response.status) {
                        // Populate the modal with the post details
                        $('#post-title').text(response.data.title);
                        $('#post-content').text(response.data.content);
                        $('#post-user').text(response.data.user_name);
                        $('#post-tenant-id').text(response.data.tenant_id);

                        // Show the modal
                        $('#viewPostModal').modal('show');
                    } else {
                        alert('No post details found.');
                    }
                },
                error: function() {
                    alert("An error occurred. Please try again.");
                }
            });
        });
    </script>
@endsection
