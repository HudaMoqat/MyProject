@extends("student.layout.master")

@section('csscode')

@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.layout.massages')

        <!-- Main content -->
        <section class="content">
            <ul class="list-group">
                @foreach(\Illuminate\Support\Facades\Auth::user()->courses as $course)
                    <li class="list-group-item">
                        <h3>{{$course->name}}</h3>
                        <ul class="list-group">
                            @if($course->assignments->isEmpty())
                                <li class="list-group-item">
                                    <h6>No Assignments</h6>
                                    <p>No assignments registered for this course.</p>
                                </li>
                            @else
                                @php
                                    $sortedAssignments = $course->assignments->sortBy('due_date');
                                @endphp
                                @foreach($sortedAssignments as $assignment)
                                    <li class="list-group-item">
                                        <h6>{{$assignment->title}}</h6>
                                        <p>{{$assignment->details}}.</p>
                                        @if($assignment->answers->isEmpty())
                                            <form method="post" enctype="multipart/form-data" action="{{route('answer.store',$assignment->id)}}">
                                                @csrf
                                                <br>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Select File</h6>
                                                        <input type="file" id="myDropify" name="answer"/>
                                                        <input type="submit" id="submit" name="submit" value="Save"/>
                                                        @error('answer')
                                                        <div class="alert alert-danger" role="alert">
                                                            <i data-feather="alert-circle"></i>
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <br>
                                            <div class="alert alert-fill-info" role="alert">
                                                You have uploaded answers!
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                @endforeach
            </ul>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('title')
    List User
@endsection

@section('jscode')

@endsection
