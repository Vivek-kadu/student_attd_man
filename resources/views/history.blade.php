<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            History Details {{ now()->format('d-m-Y') }}
        </h2>
    </x-slot>
 

    {{-- @dd($attendence_data); --}}
    {{-- @foreach ($attendence_data as $item)
        {{ $item }}
    @endforeach --}}
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
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Id
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Student Name
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Course
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Semester
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Division
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Subject
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Attendance_Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($attendence_data as $rows)
                                        <tr class="hover:bg-gray-100">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows->id }}</td>
                                            {{-- @dd($rows->status); --}}

                                            @if (!$rows->status)
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    Absent </td>
                                            @else
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    Present </td>
                                            @endif

                                            {{-- <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{$rows -> status}} </td> --}}
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows->student_details->name }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows->course_details->course_name }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows->semester_details->semester_name }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows->division_details->division_name }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows->subject_details->subject_name }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows->attendence_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- component -->





</x-app-layout>
