@extends('admin.layout.inside')
@section('content')

    <div id="content" class="app-content box-shadow-0" role="main">
        <!-- Header -->
    @include('admin.common.header')
    <!-- Main -->

        <div class="padding">


            <div class="box p-3">
                <div class="bootstrap-table">
                    <h3><i class="fa fa-marker" style="font-size: 28px;"></i> User List</h3>
                    <hr class="mb-4">

                    <table class="table table-bordered" id="user_table" data-plugin='dataTable'>
                        <thead class="thead-row" >
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Education</th>
                            <th scope="col">Skill</th>
                            <th scope="col">Industry</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="{{route('users.search')}}">
                            <tr>
                                <td><input type="text" name="name" class="form-control"></td>
                                <td><input type="text" name="email" class="form-control"></td>
                                <td><input type="text" name="job_title" class="form-control"></td>
                                <td><input type="text" name="education" class="form-control"></td>
                                <td><input type="text" name="skill" class="form-control"></td>
                                <td><input type="text" name="industry" class="form-control"></td>
                                <td><button type="submit" class="btn btn-primary">search</button></td>
                                <td></td>
                            </tr>
                        </form>
                        @if($users->count())

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ isset($user->userWorkExperience) ? $user->userWorkExperience->job_title : '' }}</td>
                                <td>{{ isset($user->userEducation) ? $user->userEducation->degree : '' }}</td>
                                <td>{{ isset($user->userSkill) ? $user->userSkill->name : '' }}</td>
                                <td>{{ isset($user->userWorkExperience) ? $user->userWorkExperience->industry : '' }}</td>
                            </tr>
                        @endforeach
                        @else
                           Users not found!
                        @endif

                        </tbody>
                    </table>
                    @if($users->count())
                        {{$users->links()}}
                    @endif
                </div>
            </div>
        </div>
        @include('admin.common.footer')
    </div>

@endsection

