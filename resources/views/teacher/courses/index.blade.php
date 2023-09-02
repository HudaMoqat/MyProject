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
                    <h3 class="card-title">courses</h3>

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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Assignment assoicated</th>
                            <th class="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset(Auth::user()->courses))
                            @foreach(Auth::user()->courses as $course)
                                <tr>
                                    <td class=" ">{{$course->id}}</td>
                                    <td class=" ">{{$course->name}}</td>
                                    <td class="">
                                        @if(!$course->assignments->isEmpty())
                                            @foreach($course->assignments as $assignment)
                                                <li>{{$assignment->title}}</li>
                                            @endforeach
                                        @else
                                            {{'NO Assignment Register'}}
                                        @endif
                                    </td>
                                    <td class="">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                            <a type="button" class="btn btn-secondary btn-sm"  href="{{route('assignment.create',$course)}}">Add Assignment</a>
                                            <a type="button" class="btn btn-primary btn-sm" href="{{route('teacher_course.edit',$course)}}">Edit Course Assignments</a>
                                            <form action="{{route('teacher_course.destroy',$course)}}" method="post" >
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                            </form>
                                        </div>
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


