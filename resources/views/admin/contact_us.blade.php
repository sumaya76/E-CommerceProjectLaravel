<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        /* General Responsive Styles */
        body {
            font-size: 1rem;
            background-color: #f8f9fa; /* Light background for better contrast */
        }

        .page-header {
            margin: 2rem 0;
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse; /* Collapse borders for cleaner look */
            margin: 1rem 0; /* Add some margin */
        }

        th, td {
            padding: 0.75rem; /* Add padding to table cells */
            text-align: center; /* Center text in table cells */
            border: 1px solid #dee2e6; /* Light gray border for cells */
        }

        th {
            background-color: rgb(142, 103, 178); /* Header background */
            color: white; /* White text for header */
            font-weight: bold; /* Bold header text */
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Light gray for even rows */
        }

        tbody tr:hover {
            background-color: #e9ecef; /* Light hover effect */
        }

        /* Responsive Media Queries */
        @media (max-width: 768px) {
            th, td {
                font-size: 0.875rem; /* Adjust font size for smaller screens */
                padding: 0.5rem; /* Adjust padding for smaller screens */
            }

            .page-header h2 {
                font-size: 1.5rem; /* Adjust the size for smaller screens */
            }
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar') <!-- Sidebar Navigation end-->
    
    <div class="page-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2>Contact Messages</h2>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Submitted On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.footer')  
</body>
</html>
