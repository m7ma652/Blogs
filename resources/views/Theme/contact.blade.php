@extends('Theme.layouts.app')
@section('title')
    Contact
@endsection
@section('contact-active')
    active
@endsection
@section('content')
    @include('Theme.layouts.hero', ['title' => 'Contact'])
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>California United States</h3>
                            <p>Santa monica bullevard</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9">
                    @if (session('message-status'))
                        <div class="alret alert-success">
                            {{ session('message-status') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" class="form-contact contact_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input class="form-control" value="{{ old('name') }}" name="name" id="name"
                                        type="text" placeholder="Enter your name">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" value="{{ old('email') }}" id="email"
                                        type="email" placeholder="Enter email address">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="subject" value="{{ old('subject') }}" id="subject"
                                        type="text" placeholder="Enter Subject">
                                    <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5"
                                        placeholder="Enter Message">{{ old('message') }}</textarea>
                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
