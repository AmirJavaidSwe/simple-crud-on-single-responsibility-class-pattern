@extends('app')
@section('title', 'Create New Customer')
@section('content')
    <form action="{{ route('customer.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <a href="{{ route('customer.index') }}" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</a> 
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
@endsection
