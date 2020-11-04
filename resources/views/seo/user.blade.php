@section('seo')
<link rel="canonical" href="{{$profile->owner->slug(true)}}">
@endsection
@section('title'){{$profile->owner->name}} | {{ config('app.name') }} @endsection
