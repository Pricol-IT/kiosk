@extends('layout.app')
@section('title')
{{__('Home')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class=" d-flex justify-content-between">
                    <h4 class="card-title p-0">All links</h4>
                    <div class="button">
                        <a href="{{ route('slideshow.create') }}" class="btn btn-primary"><i class='bx bx-plus'></i>Upload Image</a>

                    </div>
                </div>
            </div>



            <div class="card-body table-responsive p-0">
                <table class=" table datatable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($images as $image)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href="{{$image->image_url}}" target="_blank"><img src="{{$image->image_url}}" alt="img" width="100px"></a>
                            </td>
                            <td>{{ucfirst($image->status)}}</td>


                            <td>
                                <div class="d-flex gap-1">
                                    <form method="post" action="{{ route('slideshow.destroy',$image->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">record not found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</main><!-- End #main -->
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection