@extends('Backend.Master')

@section('Container')

<div class="container bg-body-secondary p-3 mt-2">
    <div class="row">

        <div class="col-md-3 text-center bg-warning rounded-right">
            <h4>Slider</h4>
        </div>
        <div class="text-end col-md-6 col-sm-8">
            <a href="" class="btn btn-outline-primary">Filter</a> |
            <a href="{{route('Add_Slider')}}" class="btn btn-outline-success">Add Slider</a> |
            <a href="" class="btn btn-outline-info">Export</a>
        </div>
        <div class="col-md-3">
            <form class="form-inline">
                <input class="form-control col-8 mr-sm-1" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-info" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<section class="mb-2">
    <div class="container bg-body-tertiary p-2">
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub-Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slider as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->sub_title}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <a href="{{url('/public/uploads/slider_img/',$item->photo)}}" target="_blank" rel="noopener noreferrer">
                        <img width="50" src="{{url('/public/uploads/slider_img/',$item->photo)}}" alt="Slider_Photo"></a>
                    </td>
                    <td>
                        @if($item->status==0)<a href="{{route('Slider_Status', $item->id)}}" class="btn btn-primary btn-sm">Inactive</a>@else
                        <a href="{{route('Slider_Status', $item->id)}}" class="btn btn-primary btn-sm">Active</a>@endif
                    </td>
                    <td>
                        <!-- <a href="" class="btn btn-success btn-sm">View</a> -->
                        <a href="{{route('Update_Slider', $item->slug)}}" class="btn btn-warning btn-sm">Update</a>
                        <!-- <a href="" class="btn btn-danger btn-sm">Delete</a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection