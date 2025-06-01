<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Order Confirmation</title>
  <style>
    body {
      background-color: #f4f4f4;
      font-family: 'Segoe UI', sans-serif;
      padding: 20px;
      margin: 0;
    }
    .email-wrapper {
      max-width: 600px;
      margin: auto;
      background: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .header {
      background-color: #4CAF50;
      color: white;
      text-align: center;
      padding: 20px;
    }
    .content {
      padding: 20px;
      color: #333;
    }
    .product {
      display: flex;
      margin-top: 20px;
      border-top: 1px solid #ddd;
      padding-top: 20px;
    }
    .product-img {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-right: 20px;
    }
    .product-details {
      flex-grow: 1;
    }
    .product-details p {
      margin: 5px 0;
    }
    .summary {
      margin-top: 20px;
      border-top: 1px solid #ddd;
      padding-top: 15px;
      font-size: 16px;
      line-height: 1.5;
    }
    .summary p {
      display: flex;
      justify-content: space-between;
      margin: 5px 0;
    }
    .summary .total {
      font-weight: bold;
      font-size: 18px;
      margin-top: 10px;
    }
    .footer {
      background-color: #f9f9f9;
      text-align: center;
      padding: 15px;
      font-size: 12px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="header">
      <h2>Order Placed Successfully!</h2>
      <p>Thank you for shopping with us</p>
    </div>
    <div class="content">
      <p>Hi {{$name}},</p>
      <p>Your order has been placed successfully. Here are your order details:</p>

      @foreach($data as $val)
      <div class="product">
        <div class="product-img">
            <img src="{{$val->image}}" width="150" height="150" alt="">
        </div>
        <div class="product-details">
          <p><strong>Product:</strong> {{$val->name}}</p>
          <p><strong>Color:</strong> {{$val->color}}</p>
          <p><strong>Size:</strong> {{$val->size}}</p>
          <p><strong>Quantity:</strong> {{$val->quantity}}</p>
          <p><strong>Amount:</strong> Rs.{{$val->total_amount}}</p>

        </div>
      </div>
      @endforeach

      <div class="summary">
        <p><span>SubTotal:</span> <span>Rs.{{$total_amount}}</span></p>
        <p><span>Shipping Amount:</span> <span>Free</span></p>
        <p><span>Tax Amount:</span> <span>Free</span></p>
        <p class="total"><span>Total Amount:</span> <span>Rs.{{$total_amount}}</span></p>
      </div>
    </div>
    <div class="footer">
      You will receive another email once your item is shipped.<br />
      Need help? Contact our support team anytime.
    </div>
  </div>
</body>
</html>
