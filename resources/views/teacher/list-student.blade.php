@extends("teacher.layout.master")
@section('csscode')

@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.layout.massages')

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Students</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th class="">Courses</th>
                            <th class="">Assignment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($students=\App\Models\User::where('is_teacher',0)->get())
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class=" ">{{$student->name}}</td>
                                    <td class=" ">{{$student->email}}</td>
                                    <td class=""><img alt="User" src="{{asset('user_images/'.$student->image)}}" width="100px"></td>
                                    <td class="">
                                        @if((!$student->courses->isEmpty()))
                                            @foreach($student->courses as $course)
                                                <li>{{$course->name}}</li>
                                            @endforeach
                                        @else
                                            {{'NO Courses Register'}}
                                        @endif
                                    </td>
                                    <td class="">
                                        @if(!$student->courses->isEmpty())
                                            <ul>
                                                @foreach($student->courses as $course)
                                                    @if(!$course->assignments->isEmpty() )
                                                        <li>Assignments for {{ $course->name }}:</li>
                                                        <ul>
                                                            @foreach($student->assignments as $assignment)
                                                                <li>{{ $assignment->title }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            {{ 'Have not assignment' }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif



                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('title')
    list User
@endsection

@section('jscode')

@endsection


