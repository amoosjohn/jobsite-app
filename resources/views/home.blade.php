@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('search.job')}}">
                <div class="input-group">
                    <input type="search" name="search" class="form-control rounded" placeholder="Search Jobs" aria-label="Search"
                           aria-describedby="search-addon" value="{{ $input ?? '' }}" required/>
                    <button type="submit" class="btn btn-primary">search</button>
                </div>
            </form>

            <div class="card" style="margin-top:10px;">
                <div class="card-header">{{ __('Jobs') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($jobs->count())

                        <ul class="list-group list-group-flush">
                            @foreach($jobs as $job)
                                <li class="list-group-item">
                                    <h5 class="card-title">{{ $job->title }}</h5>
                                    <p class="card-text  font-weight-normal">{{ $job->company_name }}</p>
                                    <h6 class="card-title">Job Description</h6>
                                    <p class="card-text">{{ $job->description }}</p>
                                    @if($job->userJob->count())
                                       <span class="text-success font-weight-bold"><i class="fa fa-check"></i>Applied</span>
                                    @else
                                        <a href="{{ route('apply.job',$job->id) }}" class="btn btn-primary">Apply</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        {{ $jobs->links() }}
                    @else
                        Search Result not found!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
