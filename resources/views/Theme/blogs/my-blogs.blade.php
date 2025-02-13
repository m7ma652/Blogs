@extends('Theme.layouts.app')
@section('title')
    My Blogs
@endsection
@section('content')
    @include('Theme.layouts.hero', ['title' => 'My Blogs'])
    @if (session('blog-delete'))
        <div class="alret alert-danger">
            {{ session('blog-delete') }}
        </div>
    @endif
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($blogs) > 0)
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <th scope="row">{{ $blog->id }}</th>
                                        <td> <a target="_blank"
                                                href="{{ route('blogs.show', ['blog' => $blog]) }}">{{ $blog->name }}</a>
                                        </td>
                                        <td>{{ $blog->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('blogs.edit', ['blog' => $blog]) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}" method="post"
                                                id="delete-form" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:$('form#delete-form').submit();"
                                                    class="btn btn-danger">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        @if (count($blogs) > 0)
                            {{ $blogs->render('pagination::bootstrap-5') }}
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
