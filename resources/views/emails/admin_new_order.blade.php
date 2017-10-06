Customer Information<br>
email: {{ $customerinformation->email }}<br>
name: {{ $customerinformation->name }}<br>
postalcode: {{ $customerinformation->postalcode }}<br>
blk: {{ $customerinformation->blk }}<br>
street: {{ $customerinformation->street }}<br>
unit: {{ $customerinformation->unit }}<br>
building: {{ $customerinformation->building }}<br>
mobile: {{ $customerinformation->mobile }}<br>
customer_id: {{ $customerinformation->customer_id }}<br>
<br><br>
Stripe<br>
customer id: {{ $customer->id}}<br>
email: {{ $customer->email}}
<br><br>
Cartitem<br>
@foreach ($cartitem as $item)
    {{ $item->qty }} x {{ $item->name }}<br>
@endforeach
Total: SGD${{ $cartTotalCents/100 }}

