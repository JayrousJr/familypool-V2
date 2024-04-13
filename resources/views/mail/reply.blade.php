<x-mail::message>
   # Hello Dear {{$name}}
   Your message has brightened our day! We want you to know that every word you've shared is
    appreciated and valued. Your insights, questions, and thoughts contribute to the rich tapestry
    of our community.<br> We're excited to dive into your message and provide you with the best
    assistance possible. Rest assured, your engagement drives us forward, and we're here to make
    your experience exceptional. Thank you for being an essential part of our journey

<x-mail::button :url="'https://thefamilypool.com'">
Go to Website
</x-mail::button>

Thanks,<br>
<pre><strong>Amani Emile</strong> Manager </pre>
 {{ config('app.name') }}
</x-mail::message>
