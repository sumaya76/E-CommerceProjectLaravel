<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        .invoice-container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
        }

        .invoice-header h1 {
            font-size: 24px;
            color: #333;
        }

        .invoice-header .invoice-info {
            text-align: right;
        }

        .invoice-info h4 {
            margin: 0;
            color: #666;
        }

        .customer-details, .product-details {
            margin-bottom: 30px;
        }

        .details h3 {
            font-size: 18px;
            color: #333;
        }

        .details p {
            font-size: 16px;
            color: #555;
        }

        .product-image {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .product-image img {
            max-width: 300px;
            height: 200px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .invoice-footer {
            text-align: center;
            color: #888;
            font-size: 14px;
            border-top: 2px solid #eee;
            padding-top: 15px;
        }

        @media (max-width: 768px) {
            .invoice-header {
                flex-direction: column;
                text-align: center;
            }

            .invoice-header h1 {
                margin-bottom: 10px;
            }

            .invoice-header .invoice-info {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Invoice</h1>
            <div class="invoice-info">
                <h4>Invoice Date: {{ date('Y-m-d') }}</h4>
                
            </div>
        </div>

        <div class="customer-details details">
            <h3>Customer Information</h3>
            <p><strong>Name:</strong> {{$data->name}}</p>
            <p><strong>Address:</strong> {{$data->receiver_address}}</p>
            <p><strong>Phone:</strong> {{$data->phone}}</p>
            <h3>Product Information</h3>
            <p><strong>Product Name:</strong> {{$data->product->title}}</p>
            <p><strong>Product Price:</strong> {{$data->product->price}}$</p>
        </div>
        <div class="product-image">
            <img src="product/{{$data->product->image}}" alt="Product Image">
        </div>

        <div class="invoice-footer">
            <p>Thank you for your business!</p>
            <p>If you have any questions, feel free to contact us at lammi8776@example.com</p>
        </div>
    </div>
</body>

</html>
