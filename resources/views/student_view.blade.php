<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students Details') }}
        </h2>
    </x-slot>
{{-- {{$data}} --}}
    <!-- filter  -->
    <div class="py-2">
        <div class="max-w-3xl mx-auto flex items-center justify-center ">

            <div class="flex flex-col justify-center">

                <div class="overflow-x-auto shadow-md ">

                    <div class="inline-block min-w-full align-middle">

                        <div class="overflow-hidden p-2 ">

                            <form action="{{ route('student.filter') }}" method="post">
                                @csrf
                                {{-- <label for="nm">student name :
                                    <input type="text" name="stu_nm" id="nm" value="">
                                </label> --}}
                                <label for="crs">Course:
                                    <select name="course" id="crs">
                                        <option value="">Select any course</option>
                                        @foreach ($stu_course as $row_crs)
                                            {{-- <option value="{{$row_crs->id}}">{{$row_crs->course_name}}</option> --}}

                                            @if ($data != null && $row_crs->id == $data['course'])
                                                <option value="{{ $row_crs->id }}" selected>{{ $row_crs->course_name }}
                                                </option>
                                            @else
                                                <option value="{{ $row_crs->id }}">{{ $row_crs->course_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>

                                <label for="sem">Semester:
                                    <select name="semester" id="sem">
                                        <option value="">Select any semester</option>
                                        @foreach ($stu_semester as $row_sem)
                                            {{-- <option value="{{$row_sem->id}}">{{$row_sem->semester_name}}</option> --}}

                                            @if ($data != null && $row_sem->id == $data['semester'])
                                                <option value="{{ $row_sem->id }}" selected>
                                                    {{ $row_sem->semester_name }}
                                                </option>
                                            @else
                                                <option value="{{ $row_sem->id }}">{{ $row_sem->semester_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>

                                <label for="div">Division:
                                    <select name="division" id="div">
                                        <option value="">Select any division</option>
                                        @foreach ($stu_division as $row_div)
                                            @if ($data != null && $row_div->id == $data['division'])
                                                <option value="{{ $row_div->id }}" selected>
                                                    {{ $row_div->division_name }}
                                                </option>
                                            @else
                                                <option value="{{ $row_div->id }}">{{ $row_div->division_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                                <input type="submit" value="submit" name="submit_btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                            id
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Roll no
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Course
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Division
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Semester
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Gender
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Phone number
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Addmission data
                                        </th>
                                        <th colspan="2" scope="col"
                                            class="py-3 px-6 text-xs  font-medium tracking-wider text-center text-gray-700 uppercase">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($stu_data as $rows_data)
                                        <tr class="hover:bg-gray-100">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->id }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->name }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->email }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->roll_no }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->course_details->course_name }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->division_details->division_name }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->semester_details->semester_name }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->gender }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->phone_no }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $rows_data->addmission_data }}</td>

                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <a href="{{ route('edit.student', [$rows_data->id]) }}"
                                                    class="text-blue-600 hover:underline">Edit</a>
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <a href="{{ route('delete.student', [$rows_data->id]) }}"
                                                    class="text-blue-600 hover:underline">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- component -->

        <div class="m p-1 flex items-center justify-center">
            <a href="{{ route('add.student') }}" class="text-green-600">
                add students
            </a>
        </div>
    </div>
    <!-- component -->





</x-app-layout>
