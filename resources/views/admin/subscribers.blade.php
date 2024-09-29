<!DOCTYPE html>
<html>
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
            max-width: 100%; /* Ensure the table doesn't overflow the container */
            border-collapse: collapse; /* Collapse borders for cleaner look */
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
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <h2>Subscribers List</h2>
        </div>
        <div class="container-fluid">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Subscribed On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $subscriber)
                        <tr>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{ $subscriber->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.footer')  
</body>
</html>
