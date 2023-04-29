@extends('front.layout.app')

@section('main_content')
<div class="checkout-container">
    <div class="checkout-left">
      <h2>Billing Information</h2>
      <form>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" style="width: 100%;">Continue to Payment</button>
        </div>
        
      </form>
    </div>
    <div class="checkout-right">
      <h2>Room Details</h2>
      <table>
        <thead>
          <tr>
            <th>Room Type</th>
            <th>Price</th>
            <th>Check-in Date</th>
            <th>Check-out Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Deluxe Room</td>
            <td>$150/night</td>
            <td>2023-05-01</td>
            <td>2023-05-05</td>
          </tr>
        </tbody>
      </table>
      <div class="checkout-total">
        <p><strong>Total:</strong> $600</p>
      </div>
    </div>
  </div>
@endsection