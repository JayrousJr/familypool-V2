<x-mail::message>
# Hello dear {{$name}}

<x-mail::panel>
Family Pool has recently received your Job application Request<br>
We are glad for your bold attempt to apply for the job in our comapny, and we will process your details and call you back after processing.
</x-mail::panel>

<x-mail::button :url="'https://thefamilypool.com'">
Button Text
</x-mail::button>

Thanks,<br>
<pre>Amani Joel, CEO</pre> 
{{ config('app.name') }}
</x-mail::message>
