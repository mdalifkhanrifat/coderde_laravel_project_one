@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit client</h1>

    <form action="{{ url('admin/client/update/'.$client->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="current_photo" value="{{ $client->slider_photo }}">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit client </h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.client.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="form-group">
                    <label for="">Client Name</label>
                    <textarea name="slider_text" class="form-control h_100" cols="30" rows="10">{{ $client->client_name }}</textarea>
                </div>


                <div class="form-group">
                    <label for="">Logo Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="rr1" value="Show" @if($client->status == 'Show') checked @endif>
                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="rr2" value="Hide" @if($client->status == 'Hide') checked @endif>
                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Existing client Photo</label>
                    <div>
                        <img src="{{ asset('uploads/'.$client->client_photo) }}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Change client Photo</label>
                    <div>
                        <input type="file" name="slider_photo">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection