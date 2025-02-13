@extends('Theme.layouts.app')
@section('title')
    Edit
@endsection
@section('content')
    @include('Theme.layouts.hero', ['title' => "$blog->name"])
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('blogs.update', ['blog' => $blog]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input class="form-control border" name="image" type="file">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <input class="form-control border" name="name" value="{{ $blog->name }}" type="text"
                                placeholder="Blog title">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control border" name="description" placeholder="Description">{{ $blog->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <select class="form-control border" name="category_id" value="{{ old('category_id') }}">
                                <option value="">Select Category</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $blog->category_id) selected @endif>
                                            {{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
