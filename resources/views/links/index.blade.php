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
                        <a href="{{ route('links.create') }}" class="btn btn-primary"><i class='bx bx-plus'></i>Create New Link</a>

                    </div>
                </div>
            </div>



            <div class="card-body table-responsive p-0">
                <table class=" table datatable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($links as $link)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$link->title}}</td>
                            <td><a href="{{$link->link_url}}">{{$link->link_url}}</a></td>
                            <td>{{ucfirst($link->status)}}</td>


                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{route('links.edit',$link->id)}}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="post" action="{{ route('links.destroy',$link->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">record not found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</main><!-- End #main -->
@endsection
