@extends('layouts.main')

@push('title')
    <title>Welcome</title>
@endpush

@section('main-section')
    {{-- <pre>
        {{ $current_records }}
    </pre>
    {{ die }} --}}
    <div class="container">
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
    {{-- for manual pagination --}}
    <div class="row">
        {{-- {{ $paginator->fragment('foo')->onEachSide(5)->links() }} --}}
        {{  $paginator->links()  }}
    </div>
    
    {{-- for auto pagination using Query builder --}}
    {{-- <div class="row">
        {{ $current_records->links() }}
    </div> --}}
@endsection
