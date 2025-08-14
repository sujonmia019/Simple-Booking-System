@extends('layouts.app')
@section('site_title', $siteTitle)
@push('styles')

@endpush
@section('content')
<div class="row my-4">
    <div class="col-md-12 col-sm-12">
        <div class="card border-0 shadow-sm rounded-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover table-striped mb-0" id="datatable">
                        <thead>
                            <th>SL</th>
                            <th>Avatar</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Register Date</th>
                            <th>Updated Date</th>
                            <th class="text-end">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{!! table_image($customer->avatar, $customer->name) !!}</td>
                                <td>{{ $customer->full_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone_number }}</td>
                                <td>{{ date_formated($customer->created_at) }}</td>
                                <td>{{ date_formated($customer->updated_at) }}</td>
                                <td>
                                    <div class="text-end">
                                        <a href="{{ route('app.customers.edit', $customer->id) }}" class="btn-style btn-edit"><i class="fas fa-edit fa-sm"></i></a>
                                        <button type="button" class="btn-style btn-delete" onclick="deleteItem({{ $customer->id }})"><i class="fas fa-trash-alt fa-sm"></i></button>
                                        <form action="{{ route('app.customers.destroy', $customer->id) }}" method="POST" class="d-none" id="delete_form_{{ $customer->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-danger">Customer records empty!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $('#datatable').DataTable({
            order: [], //Initial no order
            bInfo: true, //TO show the total number of data
            bFilter: true, //For datatable default search box show/hide
            ordering: false,
            lengthMenu: [
                [5, 10, 15, 25, 50, 100, 200],
                [5, 10, 15, 25, 50, 100, 200]
            ],
            pageLength: "{{ TABLE_PAGE_LENGTH }}",
        })
    </script>
@endpush
