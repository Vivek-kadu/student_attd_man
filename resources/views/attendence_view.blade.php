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

                        <div class="overflow-hidden p-2 ">
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

    <!-- table  -->
    @if ($data != null && $data['course'] != null && $data['semester'] != null && $data['division'] != null)


        {{-- @dd($data) --}}
        <form action="{{ route('insert.attendence') }}" method="post">
            @csrf

            {{-- course hidden  --}}
            <select name="course" id="crs" class="hidden">
                {{-- <option value="">Select any course</option> --}}

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
            {{-- end --}}

            {{-- sem hidden  --}}
            <select name="semester" id="sem" class="hidden">
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
            {{-- end  --}}

            {{-- div hidden  --}}
            <select name="division" id="div" class="hidden">
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
            {{-- end  --}}

            {{-- attendence of subject --}}
            <div class="max-w-3xl mx-auto m-3 flex items-center justify-center">
                <label for="sub">Attendence of Subject :
                    <select name="subject" id="sub">
                        <option value="">choose subject
                        </option>
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
            {{-- end  --}}

            {{-- timestamp  --}}
            <div class="hidden">
                <input class="border rounded w-60 py-2 px-3 text-grey-darker" type="datetime-local"
                    name="attendence_date" id="" value="">
            </div>
            {{-- timestamp end  --}}

            <div class="py-4">
                <div class="max-w-3xl mx-auto flex items-center justify-center ">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto shadow-md sm:rounded-lg ">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                    action
                                                </th>
                                                {{-- <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                    id
                                                </th> --}}
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                    Roll no
                                                </th>

                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                    Name
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
                                            @foreach ($stu_data as $rows_data)
                                                <tr class="hover:bg-gray-100">
                                                    
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                                        <label><input type="radio" value="0"
                                                                {{-- name="stu_id_{{ $rows_data->id }}" checked> --}}
                                                                name="{{ 'stu_id_' . $rows_data->id }}" checked>
                                                            AB</label>/
                                                        <label><input type="radio" value="1"
                                                                {{-- name="stu_id_{{ $rows_data->id }}"> PR </label> --}}
                                                                name="{{ 'stu_id_' . $rows_data->id }}"> PR </label>
                                                    </td>

                                                    {{-- <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $rows_data->id }}</td> --}}
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $rows_data->roll_no }}</td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $rows_data->name }}</td>
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
                        <div class="m-2 bg-indigo-50 flex items-center justify-center ">
                            <input type="submit" value="SUBMIT" class=" bg-green-300 rounded p-2">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif

</x-app-layout>
