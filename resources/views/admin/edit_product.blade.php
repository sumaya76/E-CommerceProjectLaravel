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

      .input-group img {
        max-width: 100px;
        max-height: 100px;
        margin-top: 10px;
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

        .input-group .form-control,
        .input-group .btn {
          width: 100%;
          margin-bottom: 0.5rem;
          border-radius: 0.125rem;
        }

        th,
        td {
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
            
          <div class="design">
            <h2>Update Product</h2>
            <form
              action="{{ url('update_product', $product->id) }}"
              method="post"
              enctype="multipart/form-data"
              style="
                display: flex;
                flex-direction: column;
                gap: 1rem;
                align-items: center;
              "
            >
              @csrf
              <div class="input-group mb-3">
                <input
                  type="text"
                  name="title"
                  class="form-control"
                  placeholder="Product Name"
                  value="{{ $product->title }}"
                />
              </div>

              <div class="input-group mb-3">
                <input
                  type="text"
                  name="description"
                  class="form-control"
                  placeholder="Product Description"
                  value="{{ $product->description }}"
                />
              </div>

              <div class="input-group mb-3">
                <input
                  type="number"
                  name="price"
                  class="form-control"
                  placeholder="Price"
                  value="{{ $product->price }}"
                />
              </div>

              <div class="input-group mb-3">
                <input
                  type="text"
                  name="category"
                  class="form-control"
                  placeholder="Category"
                  value="{{ $product->category }}"
                />
              </div>

              <div class="input-group mb-3">
                <input
                  type="number"
                  name="quantity"
                  class="form-control"
                  placeholder="Quantity"
                  value="{{ $product->quantity }}"
                />
              </div>

              <!-- Image Upload and Preview -->
              <div class="input-group mb-3">
                <input
                  type="file"
                  name="image"
                  class="form-control"
                />
                <!-- Show existing image -->
                @if($product->image)
                  <img src="{{ asset('product/'.$product->image) }}" alt="Product Image" />
                @endif
              </div>

              <button class="btn btn-success" type="submit">Update Product</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @include('admin.footer')
    <!-- JavaScript files-->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
      integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="{{ asset('/admin_css/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin_css/vendor/popper.js/umd/popper.min.js') }}">
    </script>
    <script src="{{ asset('/admin_css/vendor/bootstrap/js/bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('/admin_css/vendor/jquery.cookie/jquery.cookie.js') }}">
    </script>
    <script src="{{ asset('/admin_css/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admin_css/vendor/jquery-validation/jquery.validate.min.js') }}">
    </script>
    <script src="{{ asset('/admin_css/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admin_css/js/front.js') }}"></script>
  </body>
</html>
