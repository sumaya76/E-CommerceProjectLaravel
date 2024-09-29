<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .main_div {
            text-align: center;
            padding: 2rem;
        }
        .heading {
            font-size: 2.5rem; /* 40px */
            font-weight: 700;
            margin-bottom: 2rem; /* 32px */
        }
        .form-group label {
            font-weight: 500;
            font-size: 1rem; /* 16px */
        }
        .space {
            margin-bottom: 1.25rem; /* 20px */
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
                <div class="main_div">
                    <h1 class="heading">Add Product</h1>
                    <form action="{{url('add_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group space">
                                    <label for="room_title">Product Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="form-group space">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" rows="4" required></textarea>
                                </div>
                                <div class="form-group space">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" required min="0" step="0.01">
                                </div>
                                <div class="form-group space">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" required min="0" step="1">
                                </div>
                                <div class="form-group space">
                                    <label for="type">Category</label>
                                    <select name="category" class="form-control" required>
                                        <option selected value="fruits">Select an Option</option>
                                 @foreach ($category as $category)
                                        <option value="{{$category->category_name }}">{{$category->category_name }}</option>
                                 @endforeach
                                    </select>
                                </div>
                                <div class="form-group space">
                                    <label for="image">Upload images</label>
                                    <input type="file" name="image" class="form-control-file" >
                                </div>
                                <div class="form-group space">
                                    <input class="btn btn-primary btn-block" type="submit" value="Add Product">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>
</html>
