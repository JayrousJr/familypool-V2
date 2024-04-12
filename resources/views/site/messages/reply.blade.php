<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers Emails') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if($count > 0)
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Customer's Emails
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse the list of all
                                the enail messages that have been communicated by our customers, You can reply the
                                necessary emails to make a full communication. Thank you!
                            </p>
                            <p class="mt-1 text-sm font-bold text-gray-500 dark:text-gray-400">Message Sent
                                By: {{Auth::user()->name}}<br>Email: {{Auth::user()->email}}</p>
                            <p class="mt-1 text-sm font-bold text-gray-500 dark:text-gray-400">Total emails:
                                {{$count}}
                            </p>

                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            <tr>

                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sent On
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Subject
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Delete</span>
                                </th>


                                <!-- <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Delete</span>
                                </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emails as $message)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="{{route('reply.show', $message->id)}}">{{$loop->iteration}}</a>
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="{{route('reply.show', $message->id)}}">{{$message->created_at->format('D, F d, Y')}}</a>
                                </th>
                                <td class="px-6 py-4">
                                    <a href="{{route('reply.show', $message->id)}}"> {{$message->subject}}</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('reply.show', $message->id)}}" class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">View</a>
                                </td>
                                <!-- <td class="px-6 py-4 text-right">
                                    <a href="{{route('reply.destroy', $message->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 py-2">{{$emails->links()}}</div>
                    @else
                    <p class="my-10 mx-20 text-md text-center font-bold text-gray-500 dark:text-gray-400">You currently
                        have not
                        sent any message to the Techclouds Team, You can not view any message for now.<br>To send
                        message go to <a href="/contact" class="text-white bg-slate-500 rounded-md  px-2 py-1 hover:bg-slate-600 ">our Messaging
                            System</a> to send message</p>
                    @endif
                </div>



            </div>
        </div>
    </div>
</x-app-layout>