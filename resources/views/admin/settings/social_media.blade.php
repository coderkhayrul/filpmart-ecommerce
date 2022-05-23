@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Setting</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                    <li class="breadcrumb-item active">Social Media</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Social Media </h5>
                <a href="{{ route('manage.basic.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> Basic Settings
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('manage.social.update') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="sm_facebook">Facebook</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bx bxl-facebook"></i></div>
                                    <input name="sm_facebook" type="text" class="form-control" placeholder="Facebook Url" value="{{ $data['sm_facebook'] }}">
                                </div>
                                @error('sm_facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sm_twitter">Twitter</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class=" bx bxl-twitter"></i></div>
                                    <input name="sm_twitter" type="text" class="form-control" placeholder="Twitter Url" value="{{ $data['sm_twitter'] }}">
                                </div>
                                @error('sm_twitter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sm_linkedin">Linkedin</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class=" bx bxl-linkedin"></i></div>
                                    <input name="sm_linkedin" type="text" class="form-control" placeholder="Linkedin Url" value="{{ $data['sm_linkedin'] }}">
                                </div>
                                @error('sm_linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sm_dribbble">Dribbble</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bx bxl-dribbble"></i></div>
                                    <input name="sm_dribbble" type="text" class="form-control" placeholder="Dribbble Url" value="{{ $data['sm_dribbble'] }}">
                                </div>
                                @error('sm_dribbble')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sm_youtube">Youtube</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bx bxl-youtube"></i></div>
                                    <input name="sm_youtube" type="text" class="form-control" placeholder="Youtube Url" value="{{ $data['sm_youtube'] }}">
                                </div>
                                @error('sm_youtube')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sm_slack">Slack</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bx bxl-slack"></i></div>
                                    <input name="sm_slack" type="text" class="form-control" placeholder="Slack Url" value="{{ $data['sm_slack'] }}">
                                </div>
                                @error('sm_slack')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sm_instagram">Instagram</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bx bxl-instagram"></i></div>
                                    <input name="sm_instagram" type="text" class="form-control" placeholder="Instagram Url" value="{{ $data['sm_instagram'] }}">
                                </div>
                                @error('sm_instagram')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sm_behance">Behance</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bx bxl-behance"></i></div>
                                    <input name="sm_behance" type="text" class="form-control" placeholder="Behance Url" value="{{ $data['sm_behance'] }}">
                                </div>
                                @error('sm_behance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sm_google">Google</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bx bxl-google"></i></div>
                                    <input name="sm_google" type="text" class="form-control" placeholder="Google Url" value="{{ $data['sm_google'] }}">
                                </div>
                                @error('sm_google')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="sm_reddit">Reddit</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bx bxl-reddit"></i></div>
                                    <input name="sm_reddit" type="text" class="form-control" placeholder="Raddit Url" value="{{ $data['sm_reddit'] }}">
                                </div>
                                @error('sm_reddit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bxs-save font-size-16 align-middle me-2"></i> Social Update
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
