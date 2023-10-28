@extends('enfold.index')

@section('title','Contacter nous')

@push('css')

@endpush


@section('content')
<div class="main section" id="main" name="Main Posts">
    <div class="widget Blog" data-version="2" id="Blog1">
        <div class="blog-posts hfeed container item-post-wrap">
            <div class="blog-post hentry item-post">
                <h1 class="post-title">
                    Contacter nous
                </h1>
                <div class="post-body post-content">
                    <div dir="ltr" style="text-align: left;" trbidi="on">
                        <div class="contact-form">
                            <div class="contact section" id="contact" style="display: block;">
                                <div class="widget ContactForm" id="ContactForm1">
                                    <div class="contact-form-widget">
                                        <div class="form">
                                            <form action="{{route('contact')}}" method="POST" name="contact-form">
                                                @csrf
                                                <input class="contact-form-name" id="ContactForm1_contact-form-name" name="name" placeholder="Nom & Prenom" size="30" type="text" value="">
                                                <input class="contact-form-email" id="ContactForm1_contact-form-email" name="email" placeholder="Email" size="30" type="text" value="">
                                                <textarea class="contact-form-email-message" cols="25" id="ContactForm1_contact-form-email-message" name="message" placeholder="Message" rows="3"></textarea>
                                                <input class="contact-form-button contact-form-button-submit" id="ContactForm1_contact-form-submit" type="submit" value="Envoyer">
                                                <br>
                                                <div style="text-align: center; width: 100%;">
                                                    <div class="contact-form-error-message" id="ContactForm1_contact-form-error-message">
                                                    </div>
                                                    <div class="contact-form-success-message" id="ContactForm1_contact-form-success-message">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


@section('sidebar')
    @include('enfold.componants.sidebar')
@endsection