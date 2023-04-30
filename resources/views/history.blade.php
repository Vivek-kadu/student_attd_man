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
        <!-- filter  -->
        <div class="py-2">
            <div class="max-w-3xl mx-auto flex items-center justify-center ">
    
                <div class="flex flex-col justify-center">
    
                    <div class="overflow-x-auto shadow-md ">
    
                        <div class="inline-block min-w-full align-middle">
    
                            <div class="overflow-hidden p-2 ">
    
                                <form action="{{ route('history.filter') }}" method="post">
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
                                    <br><br>
                                    <label for="s_date">From:
                                        <input type="date" name="start_date" id="s_date"> 
                                    </label>
                                    <label for="e_date">To:
                                        <input type="date" name="end_date" id="e_date"> 
                                    </label>

                                    <input type="submit" value="submit" name="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- component -->
    <div class="py-12">
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
