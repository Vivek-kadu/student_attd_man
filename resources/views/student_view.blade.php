<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <!-- component -->
        <!-- This is an example component -->
        <div class="max-w-2xl mx-auto flex items-center justify-center ">

            <div class="flex flex-col">
                <div class="overflow-x-auto shadow-md sm:rounded-lg ">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            id
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Name
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            saf
                                        </th>
                                        <th scope="col" class="p-4">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-100">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">Apple Imac 27"</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap">Desktop PC</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">$1999</td>
                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                            <a href="#" class="text-blue-600 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- component -->

        <div class="m p-1 flex items-center justify-center">
            <a href="{{route('add.student')}}" class="text-green-600">
                add students
            </a>
        </div>
    </div>
    <!-- component -->





</x-app-layout>