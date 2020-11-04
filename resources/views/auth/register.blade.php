@extends('layouts.app')
@section('seo')
    @include('seo.register')
@endsection
@push('css')
    @include('layouts.bgGradient')
@endpush
@push('js') <script src='https://www.google.com/recaptcha/api.js'></script> @endpush
@section('content')
@include('auth.partials.register')
@endsection
@push('special-js')
    <script>
        PageListeners.listen().animateLogo({elm : "#RTlog"});
    </script>
@endpush
