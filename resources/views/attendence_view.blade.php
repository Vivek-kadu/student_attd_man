<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Attendence of date : {{ now()->format('d-m-Y') }}
        </h2>
    </x-slot>
    <!-- filter  -->
    <div class="py-2">
        <div class="max-w-3xl mx-auto flex items-center justify-center ">

            <div class="flex flex-col justify-center">

                <div class="overflow-x-auto shadow-md ">

                    <div class="inline-block min-w-full align-middle">

                        <div class="overflow-hidden ">
                            <form action="{{ route('attendence.filter') }}" method="post">
                                @csrf
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
                                            <option value="{{ $row_sem->id }}" selected>{{ $row_sem->semester_name }}
                                            </option>
                                        @else
                                            <option value="{{ $row_sem->id }}">{{ $row_sem->semester_name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </label>

                                <label for="div">Division:
                                    <select name="division" id="div">
                                        <option value="">Select any division</option>

                                    @foreach ($stu_division as $row_div)
                                        @if ($data != null && $row_div->id == $data['division'])
                                            <option value="{{ $row_div->id }}" selected>{{ $row_div->division_name }}
                                            </option>
                                        @else
                                            <option value="{{ $row_div->id }}">{{ $row_div->division_name }}</option>
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




    <!-- table  -->

        <form action="" method="post">
            @csrf

            <div class="py-4">

                <div class="max-w-3xl mx-auto flex items-center justify-center ">
-
                    <div class="flex flex-col">
                        <div class="overflow-x-auto shadow-md sm:rounded-lg ">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <div class="py-2 ">
                                        {{-- course hidden filed  --}}

                                        <select name="course" id="crs" class="hidden">
                                            <option value="">Select any course</option>

                                            @foreach ($stu_course as $row_crs)
                                                {{-- <option value="{{$row_crs->id}}">{{$row_crs->course_name}}</option> --}}

                                                @if ($data != null && $row_crs->id == $data['course'])
                                                    <option value="{{ $row_crs->id }}" selected>
                                                        {{ $row_crs->course_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $row_crs->id }}">
                                                        {{ $row_crs->course_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>


                                        {{-- sem hidden field  --}}

                                        <select name="semester" id="sem" class="hidden">
                                            <option value="">Select any semester</option>

                                            @foreach ($stu_semester as $row_sem)
                                                {{-- <option value="{{$row_sem->id}}">{{$row_sem->semester_name}}</option> --}}

                                                @if ($data != null && $row_sem->id == $data['semester'])
                                                    <option value="{{ $row_sem->id }}" selected>
                                                        {{ $row_sem->semester_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $row_sem->id }}">
                                                        {{ $row_sem->semester_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                        {{-- division hidden field  --}}

                                        <select name="division" id="" class="hidden">
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

                                        {{-- attendence of subject --}}
                                        <label for="sub">Attendence of Subject :
                                            <select name="subject" id="sub">
                                                @foreach ($stu_subject as $row_sub)
                                                    <option value="{{ $row_sub->id }}">{{ $row_sub->subject_name }}
                                                    </option>

                                                    {{-- @if ($data != null && $row_sub->id == $data['subject'])
                                                    <option value="{{ $row_sub->id }}" selected>
                                                        {{ $row_sub->subject_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $row_sub->id }}">{{ $row_sub->subject_name }}
                                                    </option>
                                                @endif --}}
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                    action
                                                </th>
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

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($att_stu as $rows_data)
                                                <tr class="hover:bg-gray-100">
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                                        <label><input type="radio" value="0"
                                                                name="user_id_{{ $rows_data->id }}" checked>
                                                            AB</label>/
                                                        <label><input type="radio" value="1"
                                                                name="user_id_{{ $rows_data->id }}"> PR </label>
                                                    </td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $rows_data->id }}</td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $rows_data->name }}</td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $rows_data->roll_no }}</td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $rows_data->course_details->course_name }}</td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $rows_data->division_details->division_name }}</td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $rows_data->semester_details->semester_name }}</td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

</x-app-layout>
