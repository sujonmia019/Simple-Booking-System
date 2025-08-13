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
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th class="text-end">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($services as $service)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->price }}</td>
                                <td>{!! STATUS_LABEL[$service->status] !!}</td>
                                <td>{{ date_formated($service->created_at) }}</td>
                                <td>{{ date_formated($service->updated_at) }}</td>
                                <td>
                                    <div class="text-end">
                                        <a href="{{ route('app.services.edit', $service->id) }}" class="btn-style btn-edit"><i class="fas fa-edit fa-sm"></i></a>
                                        <button type="button" class="btn-style btn-delete" onclick="deleteItem({{ $service->id }})"><i class="fas fa-trash-alt fa-sm"></i></button>
                                        <form action="{{ route('app.services.destroy', $service->id) }}" method="POST" class="d-none" id="delete_form_{{ $service->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-danger">Service records empty!</td>
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
            order: [],
            bInfo: true,
            bFilter: true,
            ordering: false,
            lengthMenu: [
                [5, 10, 15, 25, 50, 100, 200],
                [5, 10, 15, 25, 50, 100, 200]
            ],
            pageLength: "{{ TABLE_PAGE_LENGTH }}",
            dom: "<'row mb-2'<'col-sm-8 d-flex'lf><'col-sm-4 text-end'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-0'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                {
                    text: 'Add Service',
                    className: 'btn bg-primary border-primary rounded-0 shadow-none btn-sm',
                    action: function (e, dt, node, config) {
                        window.location.href = "{{ route('app.services.create') }}";
                    }
                }
            ],
            language: {
                lengthMenu: "_MENU_ ",
                search: "",
                searchPlaceholder: "Type to filter..."
            }
        });
    </script>
@endpush
