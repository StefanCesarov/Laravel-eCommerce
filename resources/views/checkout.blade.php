@extends('layouts.frontApp')

@section('content')


@include('partials.ecname')

<div class="container-fluid">

	<div class="row medium-padding120 bg-border-color">
		<div class="container">
		@if(session()->has('success'))
                      <div class="alert alert-success">
                        {{session()->get('success')}}
                      </div>
        @endif
			<div class="row">

				<div class="col-lg-12">
			<div class="order">
				<h2 class="h1 order-title text-center">Your Order</h2>
				<form action="#" method="post" class="cart-main">
					<table class="shop_table cart">
						<thead class="cart-product-wrap-title-main">
						<tr>
							<th class="product-thumbnail">Product</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-subtotal">Total</th>
						</tr>
						</thead>
						<tbody>

                        @foreach(Cart::content() as $item)
                            <tr class="cart_item">

                            <td class="product-thumbnail">

                                <div class="cart-product__item">
                                    <div class="cart-product-content">
                                        <h5 class="cart-product-title">{{$item->name}}</h5>
                                    </div>
                                </div>
                            </td>

                            <td class="product-quantity">

                                <div class="quantity">
                                  x {{ $item->qty }}
                                </div>

                            </td>

                            <td class="product-subtotal">
                                <h5 class="total amount">{{ $item->subtotal }} RSD</h5>
                            </td>

                            </tr>



                        @endforeach


						<tr class="cart_item total">

							<td class="product-thumbnail">


								<div class="cart-product-content">
									<h5 class="cart-product-title">Total:</h5>
								</div>


							</td>

							<td class="product-quantity">

							</td>

							<td class="product-subtotal">
								<h5 class="total amount">{{ number_format(Cart::total()) }} RSD</h5>
							</td>
						</tr>

						</tbody>
					</table>

					<div class="cheque">

						<div class="logos">
							
							
							<span style="float: right;">
								<form action="{{ route('cart.checkout.pay')}}" method="POST">
                                {{ csrf_field() }}
									  <script
									    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
									    data-key="pk_test_51JeGWyB0sQktqwYpViC9cai9hB9sWTKjLat9O0lBtIxNqHrrz4zcZu32BGcQbvkoAe2PJ1Q3m9NPYuHlWt3etQVo00WdXz7Csd"
									    data-amount="{{ Cart::total() }}"
									    data-name="Critical Hit"
									    data-description="Widget"
									    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
									    data-locale="auto"
									    data-zip-code="true">
									  </script>
								</form>
							</span>
						</div>
					</div>

				</form>
			</div>
		</div>

			</div>
		</div>
	</div>



@endsection