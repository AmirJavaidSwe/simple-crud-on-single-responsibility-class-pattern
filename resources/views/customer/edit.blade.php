@extends('app')
@section('title', 'Edit Customer ' . $customer->name)
@section('content')
    <form action="{{ route('customer.update', $customer->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $customer->name) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email', $customer->email) }}">
        </div>
        <a href="{{ route('customer.index') }}" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</a> 
        <button type="submit" class="btn btn-info float-right">Update</button>
    </form>
@endsection
