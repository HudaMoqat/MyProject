@extends("teacher.layout.master")

@section('csscode')

@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.layout.massages')

        <!-- Content Header (Page header) -->
        <form method="post" action=" {{route ('update',$course)}} " enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Main content -->
            <section class="content">
                <div >
                    <div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Courses</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" id="inputName" name="name" class="form-control" value="{{$course->name}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-check-label" for="form-check mb-2">Select Assignment</label>
                                    @foreach($assignments as $assignment)
                                        <div class="list-group">
                                            <label class="list-group-item" >
                                                <input type="checkbox" class="form-check-input me-1" id="{{$assignment->id}}" name="assignment_id[]"
                                                       value="{{$assignment->id}}" {{$course->assignments-> contains($assignment)?'checked':''}}>
                                                {{$assignment->title}}</label>
                                        </div>
                                    @endforeach
                                    @error('assignment_id[]')
                                    <div class="alert alert-danger" role="alert">
                                        <i data-feather="alert-circle"></i>
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
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



