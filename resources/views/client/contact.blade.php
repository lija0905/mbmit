@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/client/contact.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container-fluid bottom-border-style">
        <div class="row contact-margin p-4">
            <div class="col-lg-1">&nbsp;</div>
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div class="font-medium font-size-16 mb-4" style="border-bottom: 2px solid #f0c415">
                    {{ __('client.contact.contact') }}
                </div>
                <div >
                    <img src="{{ asset('assets/img/faks.jpg') }}" class="w-100">

                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 d-flex align-items-center">
                <div class="card-body">
                    {{ __('client.contact.faculty') }} <br>
                    {{ __('client.contact.address') }} <br>
                    {{ __('client.contact.postal_code') }} <br>
                    {{ __('client.contact.phone_number') }} <br>
                    {{ __('client.contact.fax_number') }} <br>
                    Email: <a href="" class="contact-link font-medium"> mube_contact@etf.rs </a> <br>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.783308205873!2d20.473712911876294!3d44.80560457095008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a9f5f2a8821%3A0x419a5e3aa04ea915!2z0JfQs9GA0LDQtNCwINGC0LXRhdC90LjRh9C60LjRhSDRhNCw0LrRg9C70YLQtdGC0LAsINCR0YPQu9C10LLQsNGAINC60YDQsNGZ0LAg0JDQu9C10LrRgdCw0L3QtNGA0LAgNzMsINCR0LXQvtCz0YDQsNC0!5e0!3m2!1ssr!2srs!4v1690543647394!5m2!1ssr!2srs"  class="w-100 h-100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

@endsection

@section('javascript')@endsection
