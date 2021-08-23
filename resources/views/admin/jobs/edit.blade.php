@extends('admin.layout.inside')
@section('content')

    <div id="content" class="app-content box-shadow-1 box-radius-3" role="main">
        <!-- Header -->
    @include('admin.common.header')
    <!-- Main -->

        <div class="padding">

            <div class="alert" id="create-message" style="display: none;">
            </div>
            <div class="tab-content p-3 mb-3 box">
                <h3><i class="fa fa-marker" style="font-size: 28px;"></i> Edit Job</h3>
                <hr class="mb-4">


                <form action="{{ route("jobs.update", [$job->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title', isset($job) ? $job->title : '') }}">
                        @if($errors->has('title'))
                            <p class="help-block">
                                {{ $errors->first('title') }}
                            </p>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="company_name">Company Name*</label>
                        <input type="text" id="company_name" name="company_name" class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" value="{{ old('company_name', isset($job) ? $job->company_name : '') }}">
                        @if($errors->has('company_name'))
                            <p class="help-block">
                                {{ $errors->first('company_name') }}
                            </p>
                        @endif

                    </div>
                    <div class="form-group ">
                        <label for="description">Description*</label>
                        <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description', isset($job) ? $job->description : '') }}</textarea>
                        @if($errors->has('description'))
                            <p class="help-block">
                                {{ $errors->first('description') }}
                            </p>
                        @endif
                    </div>

                    <div>
                        <button class="btn btn-primary mt-3 content-update">Update</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- Footer -->
        @include('admin.common.footer')
    </div>
@endsection
