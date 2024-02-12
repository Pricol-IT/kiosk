@extends('layout.app')
@section('title')
{{__('Create link')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="content">
        <div class="container-fluid">

            <form action="{{route('slideshow.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title p-0">Upload Image</h4>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="offset-md-2">
                                    Upload the New Image
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-12 p-2">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mt-2">
                                            <div class="form-group">
                                                <label class="class mb-2" for="for">
                                                    Image
                                                </label>
                                                <span class="form-label-required text-danger">*</span>
                                                <input type="file" name="image_url" id="image_url" class="form-control class " required placeholder="upload image">

                                            </div>

                                            <div class="form-group">
                                                <label class="class mb-2" for="for">    
                                                    Status
                                                    <span class="form-label-required text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value=""> Select status</option>
                                                    <option value="active" {{old('status')== 'active' ? 'selected' : ''}}>Active</option>
                                                    <option value="inactive" {{old('status')== 'inactive' ? 'selected' : ''}}>In-active</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                <span class="error text-danger">{{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <center>
                        <input type="submit" class="btn btn-primary" value='Submit'>
                        <a href="{{route('links.index')}}" class="btn btn-danger">Cancel</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</main><!-- End #main -->
@endsection
