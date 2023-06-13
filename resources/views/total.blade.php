@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">SHOPPING CART</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-dark">
                                            <tr>
                                                <th>No.</th>
                                                <th>Menu</th>
                                                <th>Canteen</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>DELETE</th>
                                                <th>Status</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $result = 0;
                                            @endphp
                                            @foreach($carts as $cart)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $cart->menus->name }}</td>
                                                    <td>{{ $cart->menus->canteens->name }}</td>
                                                    <td>{{ $cart->menus->price }}</td>
                                                    <td>{{ $cart->quantity}}</td>
                                                    <td>
                                                        <form method="POST" action="{{ route('cart.destroy', $cart->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        @if($cart->status == 0)
                                                            Unpaid
                                                        @else
                                                            Paid
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php
                                                    $result += $cart->menus->price * $cart->quantity;
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="1" class="text-right"><strong>Sub Total:</strong></td>
                                                <td ><strong>{{ $result }}</strong></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <tr>
                                        <div class="padding-bottom">
                                            <div class="d-flex justify-content-center">
                                                <label for="return_date" class="block font-medium text-sm text-gray-700">Your Money</label>
                                                <input type="number" name="number" id="price-input" class="form-control" value=""/>
                                            </div>
                                            <div class="d-flex justify-content-center" style="margin-top: 20px">
                                                <a href="{{url('total')}}" >
                                                    <button type="button" id="pay-button" class="btn btn-warning" style="padding: 5px 25px 5px 25px">PAY</button>
                                                </a>
                                            </div>
                                        </div>
                                    </tr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('pay-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission behavior

            var priceInput = document.getElementById('price-input');
            var price = parseInt(priceInput.value);

            // Validate that the price is a positive number
            if (isNaN(price) || price <= 0) {
                alert('Please enter a valid price.');
                return;
            }

            // Update the status for each row in the table
            var rows = document.querySelectorAll('tbody tr');
            rows.forEach(function(row) {
                var statusCell = row.querySelector('td:last-child');
                statusCell.textContent = 'Paid';
            });
        });
    </script>
@endsection
