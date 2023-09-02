@extends("admin.layout.master")
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
                    <h3 class="card-title">Users</h3>

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
                            <th>is Teacher</th>
                            <th class="">Courses</th>
                            <th>Image</th>
                            <th class="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($users))
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td class=" ">{{$user->name}}</td>
                                    <td class=" ">{{$user->email}}</td>
                                    <td class="">{{$user->is_teacher}}</td>
                                    <td class="">
                                        @if((!$user->courses->isEmpty()))
                                            @foreach($user->courses as $course)
                                                <li>{{$course->name}}</li>
                                            @endforeach
                                        @else
                                            {{'NO Courses Register'}}
                                        @endif
                                    </td>
                                    <td class=""><img alt="User" src="{{asset('user_images/'.$user->image)}}" width="50px"></td>
                                    <td class="">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                            <a type="button" class="btn btn-secondary btn-sm"  href="{{route('user.show',$user)}}">View</a>
                                            <a type="button" class="btn btn-primary btn-sm" href="{{route('user.edit',$user)}}">Edit</a>
                                            <form action="{{route('user.destroy',$user)}}" method="post" >
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


