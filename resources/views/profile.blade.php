@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card" style="margin-top:10px;">
                    <div class="card-header">{{ __('Manage Profile') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', isset($user) ? $user->mobile : '') }}" required autocomplete="mobile" autofocus>

                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <h5 class="col-md-7 col-form-label text-md-center">Work experience</h5>
                            </div>
                            <div class="form-group row">
                                <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }}</label>

                                <div class="col-md-6">
                                    <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title', isset($user) && isset($user->userWorkExperience) ? $user->userWorkExperience->job_title : '') }}" required autocomplete="name" autofocus>

                                    @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', isset($user) && isset($user->userWorkExperience) ? $user->userWorkExperience->company_name : '') }}" required autocomplete="name" autofocus>

                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Started Date') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="date" class="form-control @error('started_date') is-invalid @enderror" name="started_date" value="{{ old('started_date', isset($user) && isset($user->userWorkExperience) ? $user->userWorkExperience->started_date : '') }}" required>

                                    @error('started_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Industry') }}</label>

                                <div class="col-md-6">
                                    <select name="industry" class="form-control @error('industry') is-invalid @enderror">
                                        @php
                                            $industry = '';
                                        @endphp
                                        @if(isset($user) && isset($user->userWorkExperience))
                                            @php
                                                $industry = $user->userWorkExperience->industry;
                                            @endphp
                                        @endif

                                        <option value="">Select</option>
                                        <option value="Hospitality" {{ $industry == 'Hospitality' ? 'selected' : '' }}>Hospitality</option>
                                        <option value="Engineering" {{ $industry == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                        <option value="Others" {{ $industry == 'Others' ? 'selected' : '' }}>Others</option>
                                    </select>
                                    @error('industry')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <h5 class="col-md-7 col-form-label text-md-center">Education</h5>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>

                                <div class="col-md-6">
                                    <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ old('degree', isset($user) && isset($user->userEducation) ? $user->userEducation->degree : '') }}" required autocomplete="name" autofocus>

                                    @error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('School/Institute') }}</label>

                                <div class="col-md-6">
                                    <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school', isset($user) && isset($user->userEducation) ? $user->userEducation->school : '') }}" required autocomplete="name" autofocus>

                                    @error('school')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Completed Date') }}</label>

                                <div class="col-md-6">
                                    <input id="completed_date" type="date" class="form-control @error('completed_date') is-invalid @enderror" name="completed_date" value="{{ old('completed_date', isset($user) && isset($user->userEducation) ? $user->userEducation->completed_date : '') }}" required>

                                    @error('completed_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <h5 class="col-md-7 col-form-label text-md-center">User Skills</h5>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ old('skills', isset($user) && isset($user->userSkill) ? $user->userSkill->name : '') }}" required autocomplete="name" autofocus>

                                    @error('skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Upload CV') }}</label>

                                <div class="col-md-6">
                                    <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}"   accept=".pdf,.docx,.doc">

                                    @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
