<x-mail::message>
# New Service Request Received

<x-mail::panel>
<strong>Service from</strong> {{$cusName}} <br>
<strong>Email:</strong> {{$email}}. <br>
<strong>Zip</strong>: {{$zip}}. <br>
<strong>Phone</strong>: {{$phone}}. <br>
</x-mail::panel>
<x-mail::panel>
<strong>Service Requested</strong> {{$service}} <br>
<strong>Description of Service:</strong> {{$description}}.
</x-mail::panel>
<x-mail::button :url="'https://thefamilypool.com/admin/service-requests?tableSearch={{$email}}'">
For more details
</x-mail::button>

Thanks,<br>
Amani Joel, CEO <br>
{{ config('app.name') }}
</x-mail::message>