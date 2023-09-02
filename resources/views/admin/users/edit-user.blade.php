@extends("admin.layout.master")

@section('csscode')

@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.layout.massages')

        <!-- Content Header (Page header) -->
        <form method="post" action="{{route('user.update',$user)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Main content -->
            <section class="content">
                <div >
                    <div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update User</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">User Name</label>
                                    <input type="text" id="inputName" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">User Email</label>
                                    <input type="text" id="inputName" name="email" class="form-control" value="{{$user->email}}" >
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Current Password</label>
                                    <input type="text" id="inputName" name="current_password" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="inputName">New Password</label>
                                    <input type="text" id="inputName" name="new_password" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label class="form-check-label" for="form-check mb-2">Select Courses</label>
                                    @foreach($courses as $course)
                                        <div class="list-group">
                                            <label class="list-group-item" >
                                                <input type="checkbox" class="form-check-input me-1" id="{{$course->id}}" name="course_id[]" value="{{$course->id}}">
                                                {{$course->name}}</label>
                                        </div>
                                    @endforeach
                                    @error('course_id')
                                    <div class="alert alert-danger" role="alert">
                                        <i data-feather="alert-circle"></i>
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" value="{{$user->image}}" class="custom-file-input" id="customFile" name="product_image"  >
                                        <label class="custom-file-label" for="customFile">Choose image</label>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" name="submit" value="update" class="btn btn-success float-right">
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </form>

    </div>
@endsection

@section('title')
    update user
@endsection

@section('jscode')

@endsection



