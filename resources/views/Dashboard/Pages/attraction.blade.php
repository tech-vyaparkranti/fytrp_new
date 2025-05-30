@extends('layouts.dashboardLayout')
@section('title', 'Manage Attractions')
@section('content')
<x-content-div heading="Manage Major Attractions">
    <x-card-element header="Add / Edit Attraction">
        <x-form-element method="POST" enctype="multipart/form-data" id="submitForm" action="javascript:">
            <x-input type="hidden" name="id" id="id" />
            <x-input type="hidden" name="action" id="action" value="insert" />

            <x-input-with-label-element id="image" label="Image" name="image" type="file" accept="image/*" required />
            <x-input-with-label-element id="title" label="Title" name="title" required />
            <x-input-with-label-element id="short_description" label="Short Description" name="short_description" required />
            <x-select-with-label id="status" name="status" label="Status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </x-select-with-label>
            <x-input-with-label-element id="sorting" label="Sorting" type="number" name="sorting" required />
            <x-form-buttons />
        </x-form-element>
    </x-card-element>

    <x-card-element header="Attractions List">
        <x-data-table></x-data-table>
    </x-card-element>
</x-content-div>
@endsection

@section('script')
<script>
    let site_url = '{{ url('/') }}';
    let table = "";

    $(function () {
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: {
                url: "{{ route('attractionData') }}",
                type: 'POST',
                data: { '_token': '{{ csrf_token() }}' }
            },
            columns: [
                { data: "DT_RowIndex", orderable: false, searchable: false, title: "Sr.No." },
                { data: 'id', visible: false },
                {
                    data: 'image',
                    render: function (data) {
                        return data ? `<img src="${site_url}${data}" class="img-thumbnail" style="max-height:60px;">` : '';
                    },
                    orderable: false, searchable: false, title: "Image"
                },
                { data: 'title', title: 'Title' },
                { data: 'short_description', title: 'Short Description' },
                {
                    data: 'status',
                    render: function (data) {
                        return data == 1 ? 'Active' : 'Inactive';
                    },
                    title: 'Status'
                },
                { data: 'sorting', title: 'Sorting' },
                { data: 'action', orderable: false, searchable: false, title: 'Action' }
            ],
            order: [[1, 'desc']]
        });
    });

    $(document).on("click", ".edit", function () {
        let row = $.parseJSON(atob($(this).data("row")));
        if (row['id']) {
            $("#id").val(row['id']);
            $("#image").attr("required", false);
            $("#title").val(row['title']);
            $("#short_description").val(row['short_description']);
            $("#status").val(row['status']);
            $("#sorting").val(row['sorting']);
            $("#action").val("update");
            scrollToDiv();
        }
    });

    $("#submitForm").on("submit", function () {
        let form = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '{{ route('saveAttraction') }}',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status) {
                    successMessage(response.message, "reload");
                } else {
                    errorMessage(response.message);
                }
            },
            failure: function (response) {
                errorMessage("Request failed");
            }
        });
    });
</script>
@include('Dashboard.include.dataTablesScript')
@endsection
