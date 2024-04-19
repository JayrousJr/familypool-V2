<x-mail::message>
# New Job Application

<x-mail::panel>
Applicant name <strong>{{$name}}</strong> <br>
Applicant Email <strong>{{$email}}</strong> <br>

Applicants Personal Details
</x-mail::panel>

<x-mail::table>
| Zip           | State         | City      |
| ------------- |:-------------:| --------: |
| {{$zip}}      | {{$state}}    | {{$city}} |

</x-mail::table>


<x-mail::button :url="'https://thefamilypool.com/admin/job-applicants?tableSearch={{$email}}'">
For more Details
</x-mail::button>

Thanks,<br>
<pre>Amani Joel, CEO</pre> 
{{ config('app.name') }}
</x-mail::message>
