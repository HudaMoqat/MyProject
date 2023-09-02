@extends("student.layout.master")

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
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Course</th>
                            <th>Assignment</th>
                            <th>Details</th>
                            <th>Upload Answer</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assignments as $assignment)
                            <tr>
                                <td>{{$assignment->course->name}}</td>
                                <td>{{$assignment->title}}</td>
                                <td>{{$assignment->details}}</td>
                                <td>
                                    <form method="post" enctype="multipart/form-data" action="{{route('answer.store',$assignment->id)}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" id="myDropify" name="answer"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" id="submit" name="submit" value="Upload" class="btn btn-success btn-sm"/>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    {{-- Delete or other actions if needed --}}
                                </td>
                            </tr>
                        @endforeach
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
    List Unsolved Assignment
@endsection

@section('jscode')

@endsection
