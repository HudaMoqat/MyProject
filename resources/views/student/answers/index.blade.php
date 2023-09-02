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
                            <th>Download File</th>
                            <th>Delete File</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($answers as $answer)
                            <tr>
                                <td>{{$answer->assignment->course->name}}</td>
                                <td>{{$answer->assignment->title}}</td>
                                <td>{{$answer->assignment->details}}</td>
                                <td>
                                    <a href="{{ route('download', $answer->file_path) }}">Download File</a>
                                </td>
                                <td>
                                    <form action="{{ route('answer.destroy', $answer) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete File</button>
                                    </form>
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
    List User
@endsection

@section('jscode')

@endsection
