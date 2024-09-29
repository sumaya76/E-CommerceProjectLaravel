<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        /* General Responsive Styles */
        body {
            font-size: 1rem;
        }

        .form-control::placeholder {
            color: black;
            opacity: 1; /* Ensures the black color is fully opaque */
        }

        .design {
            text-align: center;
        }

        .table_deg {
            text-align: center;
            margin: auto;
            border: 0.125rem solid yellowgreen;
            margin-top: 3.125rem; /* 50px -> 3.125rem */
            width: 100%;
            max-width: 100%; /* Ensure the table doesn't overflow the container */
            overflow-x: auto; /* Allow horizontal scrolling if needed */
        }

        th {
            background-color: rgb(142, 103, 178);
            font-size: 1.25rem; /* 20px -> 1.25rem */
            padding: 0.9375rem; /* 15px -> 0.9375rem */
            font-weight: bold;
            color: white;
        }

        td {
            padding: 0.625rem; /* 10px -> 0.625rem */
            color: white;
            border: 0.0625rem solid rgb(142, 103, 178); /* 1px -> 0.0625rem */
        }
        
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        /* Form Style */
        .input-group {
            max-width: 37.5rem; /* 600px -> 37.5rem */
            width: 100%;
        }

        .form-control {
            background-color: white;
            height: 3.125rem; /* 50px -> 3.125rem */
            border-radius: 0.125rem 0 0 0.125rem; /* 2px -> 0.125rem */
            color: black;
        }
        

        /* Responsive Media Queries */
        @media (max-width: 768px) {
            .design h2 {
                font-size: 1.5rem; /* Adjust the size for smaller screens */
            }

            .input-group {
                flex-direction: column;
                max-width: 100%;
            }

            .input-group .form-control, .input-group .btn {
                width: 100%;
                margin-bottom: 0.5rem;
                border-radius: 0.125rem;
            }

            th, td {
                font-size: 1rem;
                padding: 0.625rem;
            }

            .table_deg {
                margin-top: 2rem;
                border-width: 0.0625rem; /* 1px -> 0.0625rem */
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
        <div class="container-fluid">
            <form action="{{ url('product_search') }}" method="GET" style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
                @csrf
                <input type="search" name="search" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 250px;" placeholder="Search products...">
                <input type="submit" class="btn btn-danger" value="Search" style="padding: 10px 20px; background-color: #dc3545; border: none; color: white; border-radius: 5px; cursor: pointer;">
            </form>
            
            
          <div>
            <table class="table_deg">
              <tr>
                  <th>Product Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Category</th>
                  <th>Images</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
              @foreach ($product as $products)
              <tr>
                <td>{{ $products->title }}</td>
                <td title="{{ $products->description }}">{{ Str::limit($products->description, 150) }}</td>
                <td>{{ $products->price }}$</td>
                <td>{{ $products->quantity }}</td>
                <td>{{ $products->category }}</td>
                <td>
                  <img width="50" height="50" src="{{ asset('product/' . $products->image) }}" alt="Product Image">
                </td>
                <td> 
                    <a class="btn btn-success" href="{{ url('edit_product', $products->id) }}">Edit</a></td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product', $products->id) }}">Delete</a>
                </td>
              </tr>  
              @endforeach
            </table>
          </div>
          <div class="pagination-wrapper">
            {{ $product->onEachSide(1)->links()}}
          </div>
        </div>
      </div>
    </div>
     
    @include('admin.footer') 
    <!-- JavaScript files-->
    <script>
        function confirmation(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure you want to delete this?", 
                text: "This deletion will be permanent.", 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/admin_css/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin_css/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('/admin_css/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admin_css/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('/admin_css/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admin_css/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admin_css/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admin_css/js/front.js') }}"></script> 
  </body>
</html>
