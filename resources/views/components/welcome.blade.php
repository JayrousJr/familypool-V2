<div
    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Welcome to your Family pool Service!
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        Family Pool Service is the Company in USA dealing with Swimming Pool Services of all kinds, including pool
        maintenance, pool building, pool chemicals and equipments selling, Chemical balancing, free advices and cost
        estimations.
    </p>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8">


    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                Family Pool Service
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-md leading-relaxed">
            This Panel is a full informational populated, in here you can access all the information that you have
            interacted with Family pool service, we insist you to protect your information against uurelated people.
        </p>
        <p class="mt-4 text-gray-500 dark:text-gray-400 text-md leading-relaxed">Family Pool Service Hel Desk Will
            provice the neccessary help to you whenever you do not understand how
            things work. But for helping your self, click on your image profile to the left above of the screen and go
            to Profile so as to complete and change your information accordingly. Thank You for Using Family Pool
            Service! </p>
        @if(auth()->user()->isManager() )
        <p class="mt-4 text-gray-500 dark:text-gray-400 text-md leading-relaxed">
            <a href="{{url('/admin')}}" class="text-white bg-slate-500 px-3 py-2 rounded-md">Visit Admin Panel</a>
        </p>
        @endif
    </div>
</div>