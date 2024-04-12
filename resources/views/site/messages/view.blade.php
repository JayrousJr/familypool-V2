<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Messages') }}
        </h2>
    </x-slot>
    <livewire:scripts />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form>
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 px-8 mb-6">
                            <h2 class="text-base font-seminormal leading-7 mt-3 text-gray-500 dark:text-gray-400">Email
                            </h2>
                            <p class="mt-3 text-sm font-normal text-gray-500 dark:text-gray-400">Message Sent
                                By: {{$message->name}}<br>Email: {{$message->email}}<br>Sent On:
                                {{$message->created_at->format('D, F d, Y')}}
                            </p>
                            <p class="mt-1 text-md font-normal text-gray-500 dark:text-gray-400">Subject
                                <br>{{$message->subject}}
                            </p>

                            <h2 class="text-base font-semibold leading-7 text-gray-500 dark:text-gray-400">Message Body
                            </h2>

                            <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-full">
                                    <div class="mt-1">
                                        <textarea type="text" rows="3" readonly
                                            class="block w-full rounded-large border-0 py-1.5 text-white dark:text-white shadow-sm ring-1 ring-inset bg-slate-500 dark:bg-slate-500 ring-gray-300 placeholder:text-gray-400 focus:ring-2 text-md focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline outline-zinc-200 rounded-md">{{$message->message}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button wire:click="openModal" wire:loading.attr="disabled"
                                class="px-4 py-2 rounded-md my-4 cursor-pointer bg-slate-900 text-white dark:bg-slate-900 dark:text-white outline outline-zinc-200">OpenModal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>