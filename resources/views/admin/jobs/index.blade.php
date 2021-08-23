@extends('admin.layout.inside')
@section('content')

    <div id="content" class="app-content box-shadow-0" role="main">
        <!-- Header -->
    @include('admin.common.header')
    <!-- Main -->

        <div class="padding">

            <a href="{{ route('jobs.create')  }}" class="btn btn-success">Add Job</a>
            <div class="box p-3">
                <h3><i class="fa fa-marker" style="font-size: 28px;"></i> Job List</h3>
                <hr class="mb-4">
                <div class="bootstrap-table">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-bordered" id="user_table" data-plugin='dataTable'>
                        <thead class="thead-row" >
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($jobs->count())

                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->company_name }}</td>
                                <td>{{ $job->description }}</td>
                                <td><a href="{{ route('jobs.edit',$job->id)  }}"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                        @else
                            Search Result not found!
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('admin.common.footer')
    </div>

@endsection

