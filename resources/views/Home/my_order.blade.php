<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- CSS -->
    @include('home.css')
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
        border: 0.125rem solid rgb(50, 112, 205);
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
        color: black;
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
  <body class="goto-here">
    <header>
      <!-- Header -->
      @include('home.header')

      <!-- Table Content -->
      <div>
        <table class="table_deg">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Product Price</th>
              <th>Delivery Status</th>
              <th>Product Image</th>
             
            </tr>
          </thead>
          <tbody>
            @foreach ($order as $item)
              <tr>
                <td>{{ $item->product->title }}</td>
                <td>{{ $item->product->price }}</td>
                <td>{{ $item->status }}</td>
                <td><img width="150" src="product/{{ $item->product->image }}" alt="{{ $item->product->title }} image"></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </header>

    <!-- Footer -->
    @include('home.footer')

    <!-- Loader -->
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
      </svg>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
