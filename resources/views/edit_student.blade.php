<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }}  --}}
        </h2>
    </x-slot>
    {{ $student_edit_data }}

    <!-- component -->
    <div class="flex items-center justify-center p-12 bg-transparent">

        <div class="mx-16 py-4 px-8 text-black text-xl font-bold border-r border-grey-500">Student Application
        </div>

        <form name="student_application" id="student_application" action="{{route('update.student')}}" method="POST">
            @csrf
            <div class="py-4 px-8 flex-column items-center justify-center">

                <div class="mb-4">
                    <input class="hidden border rounded w-60 py-2 px-3 text-grey-darker" type="text" name="student_id" id="student_id" value="{{$student_edit_data->id}}" placeholder="Enter Your ID">

                </div> 


                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Student Name</label>
                    <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="text" name="student_name"
                        id="student_name" value="{{ $student_edit_data->name }}" placeholder="Enter Your Name">

                </div>

                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Email:</label>
                    <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="email" name="email"
                        id="email" value="{{ $student_edit_data->email }}" placeholder="Enter Your email">

                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Roll no:</label>
                    <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="text" name="roll_no"
                        id="roll_no" value="{{ $student_edit_data->roll_no }}" placeholder="Enter Your Roll no">

                </div>

                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Course name:</label>
                    <select name="course_name" id="course_name" class="rounded">
                        <option selected>Choose a course</option>
                        @foreach ($stu_course as $items)
                            @if ($student_edit_data != null && $items->id == $student_edit_data['courses_id'])
                                <option value="{{ $student_edit_data->courses_id }}" selected>
                                    {{ $student_edit_data->course_details->course_name }}</option>
                            @else
                                <option value="{{ $items->id }}">{{ $items->course_name }}</option>
                            @endif
                        @endforeach
                    </select>

                    <!-- <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="text" name="course_name" id="course_name" value="" placeholder="Enter Your Course name"> -->
                    <!-- <p id=error_creater_id></p> -->

                </div>


                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Division:</label>
                    <select name="division_name" id="division_name">
                        <option selected>choose a division</option>
                        @foreach ($stu_division as $items)
                            @if ($student_edit_data != null && $items->id == $student_edit_data['divisions_id'])
                                <option value="{{ $student_edit_data->divisions_id }}" selected>
                                    {{ $student_edit_data->division_details->division_name }}</option>
                            @else
                                <option value="{{ $items->id }}">{{ $items->division_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <!-- <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="text" name="course_name" id="course_name" value="" placeholder="Enter Your Course name"> -->
                    <!-- <p id=error_creater_id></p> -->
                </div>

                <!-- semester  -->
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Semester:</label>
                    <select name="semester_name" id="semester_name">
                        <option selected>choose a semester</option>
                        @foreach ($stu_semester as $items)
                            @if ($student_edit_data != null && $items->id == $student_edit_data['semesters_id'])
                                <option value="{{ $student_edit_data->semesters_id }}" selected>
                                    {{ $student_edit_data->semester_details->semester_name }}</option>
                            @else
                                <option value="{{ $items->id }}">{{ $items->semester_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <!-- <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="text" name="course_name" id="course_name" value="" placeholder="Enter Your Course name"> -->
                    <!-- <p id=error_creater_id></p> -->
                </div>


                <!-- gender  -->
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Gender:</label>


                    @if ($student_edit_data != null && $student_edit_data['gender'] == 'MALE')
                        MALE <input class=" border rounded w-60 py-2 px-3 text-grey-darker " type="radio"
                            name="gender" id="gender" value="MALE" placeholder="Enter Your gender name" checked>

                        FEMALE <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="radio"
                            name="gender" id="gender" value="FEMALE" placeholder="Enter Your gender name">

                        OTHER <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="radio"
                            name="gender" id="gender" value="OTHER" placeholder="Enter Your gender name">
                    @elseif ($student_edit_data != null && $student_edit_data['gender'] == 'FEMALE')
                        MALE <input class=" border rounded w-60 py-2 px-3 text-grey-darker " type="radio"
                            name="gender" id="gender" value="MALE" placeholder="Enter Your gender name"
                            checked>

                        FEMALE <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="radio"
                            name="gender" id="gender" value="FEMALE" placeholder="Enter Your gender name"
                            checked>

                        OTHER <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="radio"
                            name="gender" id="gender" value="OTHER" placeholder="Enter Your gender name">
                    @else
                        MALE <input class=" border rounded w-60 py-2 px-3 text-grey-darker " type="radio"
                            name="gender" id="gender" value="MALE" placeholder="Enter Your gender name"
                            checked>

                        FEMALE <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="radio"
                            name="gender" id="gender" value="FEMALE" placeholder="Enter Your gender name">

                        OTHER <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="radio"
                            name="gender" id="gender" value="OTHER" placeholder="Enter Your gender name"
                            checked>
                    @endif
                    <!-- <p id=error_creater_id></p> -->
                </div>

                <!-- phone  -->
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Phone no:</label>
                    <input class=" border rounded w-60 py-2 px-3 text-grey-darker" type="text" name="phone_no"
                        id="phone_no" value="{{$student_edit_data->phone_no}}" placeholder="Enter Your phone no">

                </div>

                <!-- admmision date  -->
                <div class="hidden mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Addmission Date:</label>
                    <input class="border rounded w-60 py-2 px-3 text-grey-darker" type="datetime-local"
                        name="addmission_date" id="addmission_date" value="{{$student_edit_data->addmission_data}}" >
                    <p id=error_intake_year></p>
                </div>
                <div class="mb-4 ">
                    <input type="submit" value="ADD STUDENT"
                        class="mb-2 mx-16 text-sm rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500 ">
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
