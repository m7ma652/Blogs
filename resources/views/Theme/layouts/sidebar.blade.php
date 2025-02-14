@php
    $sidebarCategories = App\Models\Category::get();
    $recentBlogs = App\Models\Blog::latest()->take(3)->get();
@endphp
<!-- Start Blog Post Siddebar -->
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            @if (session('status'))
                <div class="alret alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('subscriber.store') }}" method="POST">
                @csrf
                <div class="form-group mt-30">
                    <div class="col-autos">
                        <input name="email" value="{{ old('email') }}" type="text" class="form-control"
                            id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email'">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                </div>
                <button class="bbtns d-block mt-20 w-100">Subcribe</button>
            </form>
        </div>

        @if (count($sidebarCategories) > 0)
            <div class="single-sidebar-widget post-category-widget">
                <h4 class="single-sidebar-widget__title">Catgory</h4>
                <ul class="cat-list mt-20">
                    @foreach ($sidebarCategories as $sidebarCategory)
                        <li>
                            <a href="{{ route('theme.category', ['id' => $sidebarCategory->id]) }}"
                                class="d-flex justify-content-between">
                                <p>{{ $sidebarCategory->name }}</p>
                                <p>({{ count($sidebarCategory->blogs) }})</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (count($recentBlogs) > 0)
            <div class="single-sidebar-widget popular-post-widget">
                <h4 class="single-sidebar-widget__title">Recent Blogs</h4>
                @foreach ($recentBlogs as $blog)
                    <div class="popular-post-list">
                        <div class="single-post-list">
                            <div class="thumb">
                                <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}"
                                    alt="">
                                <ul class="thumb-info">
                                    <li><a href="#">{{ $blog->user->name }}</a></li>
                                    <li><a href="#">{{ $blog->created_at->format('d M') }}</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                    <h6>{{ $blog->name }}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
<!-- End Blog Post Siddebar -->
