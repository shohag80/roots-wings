@extends('Backend.Master')

@section('Container')

<div class="container">
    <div class="row pt-3 pb-3">
        <div class="col-md-3"></div>
        <div class="col-md-6 bg-body-secondary border rounded">
            <div class="row bg-success pt-5 pb-2 mb-2 rounded">
                <h3 class="text-center text-white"><span class="text-warning">Update</span> Slider</h3>
            </div>
            <form action="{{route('Slider_Update_Store', $slider_info->id)}}" method="post" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="InputTitle" class="form-label">Title</label><span class="text-danger">*</span>
                                <input type="text" name="title" required value="{{$slider_info->title}}" class="form-control" id="InputTitle" placeholder="Enter Slider Title">
                                @error('title')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputSubTitle" class="form-label">Sub-Title</label>
                                <input type="text" name="sub_title" required value="{{$slider_info->sub_title}}" class="form-control" id="InputSubTitle" placeholder="Enter Slider Sub-Title">
                                @error('sub_title')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputSlug" class="form-label">Slug</label><span class="text-danger">*</span>
                                <input type="text" name="slug" required value="{{$slider_info->slug}}" class="form-control" id="InputSlug" maxlength="10" placeholder="Enter Slider Slug">
                                @error('slug')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputDescription" class="form-label">Description</label><span class="text-danger">*</span>
                                <input type="text" name="description" required value="{{$slider_info->description}}" class="form-control" id="InputDescription" placeholder="Enter Slider Description">
                                @error('description')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputLink" class="form-label">Link</label><span class="text-danger">*</span>
                                <input type="text" name="link" required value="{{$slider_info->link}}" class="form-control" id="InputLink" placeholder="Enter Slider Link">
                                @error('link')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputImage" class="form-label">Product Name</label><span class="text-danger">*</span>
                                <input type="file" name="image" value="{{$slider_info->name}}" class="form-control" id="InputImage" placeholder="Enter Slider Image">
                                @error('name')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="col-md-12 btn btn-outline-primary mt-3 mb-5">Submit</button>
            </form>
            <div class="col-md-3"></div>
        </div>
    </div>

    @endsection