@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Client</h1>

    <form action="{{ route('admin.client.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Client</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.client.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Client Name</label>
                    <input type="text" name="client_name" class="form-control" value="{{ old('client_name') }}" autofocus>
                </div>
                
                {{-- <div class="form-group">
                    <label for=""> Status</label>
                    <input type="text" name="client_name" class="form-control" value="{{ old('client_name') }}" autofocus>
                </div> --}}
                <div class="form-group">
                    <label for="">Logo Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="rr1" value="Show">
                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="rr2" value="Hide">
                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Client Logo*</label>
                    <div>
                        <input type="file" name="client_photo">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
