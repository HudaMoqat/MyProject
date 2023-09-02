@extends("admin.layout.master")

@section('csscode')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection


@section('content')
    <div class="content-wrapper">
        @include('admin.layout.massages')

        <!-- Content Header (Page header) -->
        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
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
                                    <label for="inputName">User Name</label>
                                    <input type="text" id="inputName" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name'){{$message}} @enderror

                                </div>
                                <div class="form-group">
                                    <label for="inputName">User email</label>
                                    <input type="text" id="inputName" name="email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email'){{$message}} @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">User password</label>
                                    <input type="password" id="inputName" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password'){{$message}} @enderror
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

                                <label for="row">Is Teacher</label><br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><input type="radio" value="1" name="isTeacher"></span>
                                            </div>
                                            <input type="text" value="Yes" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><input type="radio" value="0" name="isTeacher"></span>
                                            </div>
                                            <input type="text" value="No" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control @error('user_image') is-invalid @enderror" id="customFile" name="user_image">
                                        <label class="custom-file-label" for="customFile">Choose image</label>
                                        @error('user_image'){{$message}} @enderror
                                    </div>
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
    add user
@endsection

@section('jscode')

@endsection



