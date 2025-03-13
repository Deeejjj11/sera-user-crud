@extends('welcome')

@section('content')
<div class="container">
    <h2>User Details</h2>
    <table class="table">
        <tr>
            <th>Name:</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $user->email }}</td>
        </tr>
    </table>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
