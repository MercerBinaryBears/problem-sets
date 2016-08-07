@extends('layouts.main')
    
@section('styles')
    @parent
    @include('assets.chosen-styles')
@endsection

@section('content')
<div class="grid">
    <div class="grid-33">
        Hey
    </div>
    <div class="grid-33">
        Hey
    </div>
    <div class="grid-33">
        Hey
    </div>
</div>
@endsection

@section('scripts')
    @include('assets.chosen-scripts')
@endsection
