<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
            <x-btn-link class="mt-4 float-right"  href="{{route('tenants.create')}}">
              Add tenant
            </x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                        <thead class="text-xs uppercase text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">email</th>
                                <th scope="col" class="px-6 py-3">domain</th>
                                <th scope="col" class="px-6 py-3">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenants as $tenant)
                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark-text-white">
                                    {{$tenant->name}}
                                </th>
                                <td class="px-6 py-4"> {{$tenant->email}}</td>
                                <td class="px-6 py-4"> 
                                    @foreach ($tenant->domains as $domain)
                                        {{$domain->domain}} {{$loop->last ? '':','}}
                                    @endforeach
                                   
                                </td>
                                <td class="px-6 py-4"> </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                  
                    {{-- {{ __("You're logged in!") }} --}}


                    {{-- <x-btn-link href="/">Tenants</x-btn-link> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
