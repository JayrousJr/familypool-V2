<x-mail::message>
# Hello our dear customer Mr/Mrs {{$cusName}}

<x-mail::panel>
We have successiful received your Service application form here at Family Pool service. <br>
We will call you soon to proceed with the service. <br>
Thank you for making the best choice to choose Family Pool Service as your pool service provider.
</x-mail::panel>

<x-mail::button :url="'https://thefamilypool.com'" color="success">
Visit the Website
</x-mail::button>

Thanks,<br>
<strong>Amani Joel,</strong> CEO. <br>
{{ config('app.name') }}
</x-mail::message>