@extends('Theme.layouts.app')
@section('title')
    Blog Details
@endsection
@section('category-active')
    active
@endsection
@section('content')
    @include('Theme.layouts.hero', ['title' => $blog->name])
    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        <img class="img-fluid" src="{{ asset("storage/blogs/$blog->image") }}" alt="">
                        <a href="#">
                            <h4>{{ $blog->name }}</h4>
                        </a>
                        <div class="user_details">
                            <div class="float-right mt-sm-0 mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>{{ $blog->user->name }}</h5>
                                        <p>{{ $blog->created_at }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <img width="42" height="42" src="{{ asset('assets') }}/img/avatar.png"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>{{$blog->description}}</p>
                    </div>

                    <div class="comments-area">
                        <h4>05 Comments</h4>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('assets') }}/img/avatar.png" width="50px">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Emilly Blunt</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('assets') }}/img/avatar.png" width="50px">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Maria Luna</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('assets') }}/img/avatar.png" width="50px">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Ina Hayes</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Enter Name" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Name'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="Enter email address"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject"
                                    value="{{ old('subject') }}" placeholder="Subject" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Subject'">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Messege'" required="">{{ old('message') }}</textarea>
                            </div>
                            <a href="#" class="button submit_btn">Post Comment</a>
                        </form>
                    </div>
                </div>
                @include('Theme.layouts.sidebar')
            </div>
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection
