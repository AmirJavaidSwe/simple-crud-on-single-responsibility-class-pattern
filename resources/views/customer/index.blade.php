@extends('app')
@section('title', 'Customers List')
@section('create_customer')
    <a href="{{ route('customer.create') }}" class="btn btn-sm btn-success float-right mt-2"
        title="Create New Customer">
        <i class="fas fa-plus"></i> Create New Customer
    </a>
@endsection
@section('content')

    <table class="table table-striped table-hover table-bordered mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Ations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->created_at }}</td>
                    <td>{{ $customer->updated_at }}</td>
                    <td>
                        <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-sm btn-primary"
                            data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:;" class="delete-customer btn btn-sm btn-danger" data-toggle="tooltip"
                            data-placement="top" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <form method="post" class="delete-customer-form"
                            action="{{ route('customer.destroy', $customer->id) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    <script>
        $(function() {
            $(document).on('click', '.delete-customer', function(e) {
                e.preventDefault();
                if (confirm("Are you sure you want to delete this customer?")) {
                    $(this).next('.delete-customer-form').submit();
                }
            })
        })
    </script>
@endsection
