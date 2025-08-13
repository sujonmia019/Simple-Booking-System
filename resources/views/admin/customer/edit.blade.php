@extends('layouts.app')
@section('site_title', $siteTitle)
@push('styles')

@endpush
@section('content')
<div class="row my-4">
    <div class="col-md-4 mx-auto col-sm-12">
        <div class="card border-0 shadow-sm rounded-0">
            <div class="card-body">
                <form action="{{ route('app.customers.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="update_id" value="{{ $edit->id }}">
                    <x-inputbox label="Full Name" name="full_name" required="required" value="{{ $edit->full_name }}"/>
                    <x-inputbox type="email" label="Email" name="email" required="required" value="{{ $edit->email }}"/>
                    <x-inputbox type="tel" label="Phone Number" name="phone_number" required="required" value="{{ $edit->phone_number }}"/>
                    <x-inputbox type="file" label="Avatar" name="avatar"/>
                    <input type="hidden" name="old_avatar" value="{{ $edit->avatar ?? '' }}">
                    <x-button type="submit" btnClass="primary" label="Update"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
