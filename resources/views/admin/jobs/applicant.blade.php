@extends('admin.layout.inside')
@section('content')

    <div id="content" class="app-content box-shadow-0" role="main">
        <!-- Header -->
    @include('admin.common.header')
    <!-- Main -->

        <div class="padding">

            <div class="box p-3">
                <h3><i class="fa fa-marker" style="font-size: 28px;"></i> Applicants</h3>
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
                            <th scope="col">Candidate Name</th>
                            <th scope="col">Job Title</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($userJobs->count())

                            @foreach($userJobs as $userJob)
                                <tr>
                                    <td>{{ $userJob->user->name ?? '-' }}</td>
                                    <td>{{ $userJob->job->title ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td></td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('admin.common.footer')
    </div>

@endsection

