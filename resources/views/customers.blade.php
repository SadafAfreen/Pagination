@extends('layouts.main')

@push('title')
    <title>Customers List</title>
@endpush

@section('main-section')
    {{-- <pre>
        {{ $current_records }}
    </pre>
    {{ die }} --}}
    <div class="container">
        <div id="paginate">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Address</th>
                        <th>DOB</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($current_records as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->gender }}</td>
                            <td>{{ $customer->state }}</td>
                            <td>{{ $customer->country }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->dob }}</td>
                            <td>{{ $customer->status }}</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- for manual pagination --}}
    {{-- <div class="row">
        {{ $paginator->fragment('foo')->onEachSide(5)->links() }}
        {{  $paginator->links()  }}
    </div> --}}
    
    {{-- for auto pagination --}}
    <div class="row">
        {{ $current_records->links() }}
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
            });
        });

        function fetch_data(page) {
            $.ajax({
                url: '/?page=' + page,
                success: function (data) {
                    $('#paginate').html(data);
                }
            });
        }
    </script>
@endsection
