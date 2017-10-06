Hi {{ $customerinformation->name }},
<br><br>
Thank you for your order.
<br>
Your orders are :<br>
@foreach ($cartitem as $item)
    {{ $item->qty }} x {{ $item->name }}<br>
@endforeach
<br>
Orders are usually shipped within 2 working days.
<br><br>
You will be emailed the tracking number as soon as it is shipped.
<br><br>
You can track your orders at :<br>
http://{{ config('constants.domainUrl') }}/track-order
<br><br>
Thank you,<br>
Sarah<br>
{{ env('MAIL_FROM_ADDRESS') }}
