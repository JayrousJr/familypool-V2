<x-mail::message>
Message From <strong>{{$name}}</strong><br>
<strong>Email</strong> {{$email}}<br>
<strong>Message Body</strong> {{$Emessage}}

<x-mail::button :url="'https://thefamilypool.com/admin'">
Go to Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
