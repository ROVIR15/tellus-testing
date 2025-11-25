@extends('layouts.app')

@section('content')
    <x-section-testimony :testimonies="$testimonies" :fallback="false" />
@endsection