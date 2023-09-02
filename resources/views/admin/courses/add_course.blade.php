@if(\Illuminate\Support\Facades\Auth::user()->name=='huda')
    @extends('admin.layout.master')
{{--@else--}}
{{--    @extends('teacher.layout.master')--}}
@endif
@section('title')
    Add Course
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.layout.massages')

        <!-- Content Header (Page header) -->
        <form method="post" action="{{route('course.store')}}" enctype="multipart/form-data">
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
                                    <label for="inputName">Course Name</label>
                                    <input type="text" id="inputName" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name'){{$message}} @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" name="submit" value="Create new Course" class="btn btn-success float-right">
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </form>

    </div>
@endsection


@section('jscode')

@endsection



