// Layout Template (resources/views/layouts/app.blade.php)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @include('partials.nav')
        @yield('content')
    </div>
</body>
</html>

// Navigation Bar (resources/views/partials/nav.blade.php)
<nav>
    <a href="/dashboard">Dashboard</a>
    <a href="/books">Books</a>
    @if(auth()->user()->role == 'admin')
        <a href="/admin/books">Manage Books</a>
        <a href="/admin/rent-requests">Rent Requests</a>
        <a href="/admin/reports">Reports</a>
    @endif
    <form action="/logout" method="POST">@csrf<button>Logout</button></form>
</nav>

// Dashboard View (resources/views/dashboard.blade.php)
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<h1>Welcome, {{ auth()->user()->name }}!</h1>
@endsection

// Book List View (resources/views/books/index.blade.php)
@extends('layouts.app')
@section('title', 'Available Books')
@section('content')
<h2>Available Books</h2>
<ul>
@foreach ($books as $book)
    <li>{{ $book->title }} by {{ $book->author }}
        <form action="/rent-request/{{ $book->id }}" method="POST">
            @csrf
            <button type="submit">Request Rent</button>
        </form>
    </li>
@endforeach
</ul>
@endsection

// Admin: Book Management Index (resources/views/admin/books/index.blade.php)
@extends('layouts.app')
@section('title', 'Manage Books')
@section('content')
<h2>Manage Books</h2>
<a href="{{ route('admin.books.create') }}">Add Book</a>
<table>
    <tr><th>Title</th><th>Author</th><th>Category</th><th>Status</th><th>Actions</th></tr>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category }}</td>
            <td>{{ $book->status }}</td>
            <td>
                <a href="{{ route('admin.books.edit', $book->id) }}">Edit</a>
                <form method="POST" action="{{ route('admin.books.destroy', $book->id) }}">
                    @csrf @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection

// Admin: Rent Requests (resources/views/admin/rent_requests/index.blade.php)
@extends('layouts.app')
@section('title', 'Rent Requests')
@section('content')
<h2>Rent Requests</h2>
<table>
<tr><th>User</th><th>Book</th><th>Status</th><th>Actions</th></tr>
@foreach($requests as $request)
    <tr>
        <td>{{ $request->user->name }}</td>
        <td>{{ $request->book->title }}</td>
        <td>{{ $request->status }}</td>
        <td>
            <form action="/admin/rent-requests/{{ $request->id }}/approve" method="POST">@csrf<button>Approve</button></form>
            <form action="/admin/rent-requests/{{ $request->id }}/reject" method="POST">@csrf<button>Reject</button></form>
        </td>
    </tr>
@endforeach
</table>
@endsection

// Admin: Reports (resources/views/admin/reports/index.blade.php)
@extends('layouts.app')
@section('title', 'Reports')
@section('content')
<h2>Library Report</h2>
<ul>
    <li>Total Books: {{ $totalBooks }}</li>
    <li>Rented Books: {{ $rentedBooks }}</li>
    <li>Available Books: {{ $availableBooks }}</li>
    <li>Active Users: {{ $activeUsers }}</li>
</ul>
<h3>Rental History</h3>
<table>
<tr><th>User</th><th>Book</th><th>Rented</th><th>Returned</th></tr>
@foreach($rentalHistory as $history)
    <tr>
        <td>{{ $history->user->name }}</td>
        <td>{{ $history->book->title }}</td>
        <td>{{ $history->rent_date }}</td>
        <td>{{ $history->return_date }}</td>
    </tr>
@endforeach
</table>
@endsection
