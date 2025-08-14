@extends('layouts.app')
@section('site_title', $siteTitle)
@push('styles')

@endpush
@section('content')
<div class="row my-4">
    <div class="col-md-4 mx-auto col-sm-12">
        <div class="card border-0 shadow-sm rounded-0">
            <div class="card-body">
                <form action="{{ route('app.services.store') }}" method="POST">
                    @csrf
                    @isset($edit)
                    <input type="hidden" name="update_id" value="{{ $edit->id }}">
                    @endisset

                    <x-inputbox label="Service Name" name="name" required="required" value="{{ $edit->name ?? old('name') }}"/>
                    <x-inputbox label="Price" name="price" required="required" value="{{ $edit->price ?? old('price') }}"/>
                    <x-textarea label="Description" name="description" required="required" value="{{ $edit->description ?? old('description') }}"></x-textarea>
                    <x-selectbox label="Status" name="status" required="required">
                        @foreach (STATUS as $index=>$value)
                        <option value="{{ $index }}" @isset($edit) {{ $edit->status == $index ? 'selected' : '' }} @endisset>{{ $value }}</option>
                        @endforeach
                    </x-selectbox>

                    @isset($edit)
                    <x-button type="submit" btnClass="primary" label="Update"/>
                    @else
                    <x-button type="submit" btnClass="primary" label="Save"/>
                    @endisset
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
