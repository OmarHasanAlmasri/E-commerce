@extends('layouts.app')

@section('page-content')
    <div
        class="mb-5"
        style="
        height: 400px;
        background-image: url('https://static.vecteezy.com/system/resources/thumbnails/009/385/064/small/contact-us-buttons-clipart-design-illustration-free-png.png');
        background-repeat: no-repeat; background-size: cover; background-position: center">
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-6">
                <div class="card py-5 px-4">
                    <h3 class="text-center mb-5">Message Us</h3>

                    @if(session()->has('success_message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success_message') }}
                    </div>
                    @endif

                    <form action="{{ route('contact_us.store') }}" method="post" novalidate>
                        {{--                        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                        @csrf
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="3"
                                          placeholder="Your message">{{ old('message') }}</textarea>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-6 align-self-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.5719770320725!2d35.8319305756297!3d31.972506674010205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca155f0d786d9%3A0xf890a14ea7fad832!2sThe%20Hope%20International%20Company!5e0!3m2!1sen!2sjo!4v1698602067924!5m2!1sen!2sjo"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection
