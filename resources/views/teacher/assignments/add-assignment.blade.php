@extends("teacher.layout.master")

@section('csscode')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection


@section('content')
    <div class="content-wrapper">
        @include('admin.layout.massages')

        <!-- Content Header (Page header) -->
        <form method="post" action="{{route('assignment.store')}}" enctype="multipart/form-data">
            @csrf
            <!-- Main content -->
            <section class="content">
                <div >
                    <div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Assignment Title</label>
                                    <input type="text" id="inputName" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror">
                                    @error('title'){{$message}} @enderror

                                </div>
                                <div class="form-group">
                                    <label for="inputName">Due_Date</label>
                                    <input type="date" id="inputName" name="date" class="form-control @error('date') is-invalid @enderror">
                                    @error('date'){{$message}} @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Details</label>
                                    <input type="text" id="inputName" name="detail" class="form-control @error('detail') is-invalid @enderror">
                                    @error('detail'){{$message}} @enderror
                                </div>

                                <div class="form-group">
                                    <label>Courses Select</label>
                                    @foreach($courses as $course)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="course_id[]" value="{{$course->id}}" id="course{{$course->id}}">
                                            <label class="custom-control-label" for="course{{$course->id}}">{{$course->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" name="submit" value="Create new User" class="btn btn-success float-right">
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </form>

    </div>
@endsection

@section('title')
    add assignment
@endsection

@section('jscode')

@endsection



