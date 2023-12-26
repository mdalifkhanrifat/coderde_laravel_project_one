@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add engineering work</h1>

    <form action="{{ route('admin.engineering-work.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Service</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.engineering-work.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Short Description</label>
                    <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ old('short_description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Photo *</label>
                    <div>
                        <input type="file" name="photo">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Choose Post Status:</label>
                    <div>
                        <select id="working_status" name="working_status">
                            <option value="0">...Select...</option>
                            <option value="1">Active</option>
                            <option value="2">Close</option>
                            <option value="3">Ongoing</option>
                            <option value="4">Up Comming</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                </div>
                <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ old('seo_meta_description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
