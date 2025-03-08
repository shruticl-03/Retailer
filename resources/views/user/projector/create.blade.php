@extends('user.layout.app')
@section('content')
<div class="main-content">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Projector</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                {{-- <div class="btn-group">

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div> --}}
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                {{-- <h6 class="mb-0 text-uppercase">Text Inputs</h6> --}}
                <hr>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Country</label>
                                <input class="form-control" type="text" name="country"
                                    value="{{ @$location->country }}" readonly aria-label="default input example">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Region</label>
                                <input class="form-control" type="text" name="region"
                                    value="{{ @$location->region }}" readonly aria-label="default input example">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">City</label>
                                <input class="form-control" type="text" name="city" value="{{ @$location->city }}"
                                    readonly aria-label="default input example">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Latitude</label>
                                <input class="form-control" type="text" name="latitude"
                                    value="{{ @$location->latitude }}" readonly aria-label="default input example">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Longitude</label>
                                <input class="form-control" type="text" name="longitude"
                                    value="{{ @$location->longitude }}" readonly aria-label="default input example">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Video</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-grd btn-grd-success px-5">Add Projector</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
@endsection