@extends('layouts.dashboardLayout')
@section('title', 'Manage FAQs')

@section('content')
<x-content-div heading="Manage FAQs">
    <x-card-element header="Add / Edit FAQ">
        <x-form-element method="POST" id="submitForm" action="javascript:">
            <x-input type="hidden" name="id" id="id" />
            <x-input type="hidden" name="action" id="action" value="insert" />

            <x-input-with-label-element id="question" label="Question" name="question" required />
            <x-input-with-label-element id="answer" label="Answer" name="answer" required />
            <x-select-with-label id="status" name="status" label="Status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </x-select-with-label>
            <x-input-with-label-element id="sort_order" label="Sorting" type="number" name="sort_order" required />
            <x-form-buttons />
        </x-form-element>
    </x-card-element>

    <x-card-element header="FAQ List">
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
                url: "{{ route('faqData') }}",
                type: 'POST',
                data: { '_token': '{{ csrf_token() }}' }
            },
            columns: [
                { data: "DT_RowIndex", orderable: false, searchable: false, title: "Sr.No." },
                { data: 'id', visible: false },
                { data: 'question', title: 'Question' },
                { data: 'answer', title: 'Answer' },
                {
                    data: 'status',
                    render: function (data) {
                        return data == 1 ? 'Active' : 'Inactive';
                    },
                    title: 'Status'
                },
                { data: 'sort_order', title: 'Sorting' },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                    title: 'Action'
                }
            ],
            order: [[1, 'desc']]
        });
    });

    $(document).on("click", ".edit", function () {
        let row = $.parseJSON(atob($(this).data("row")));
        if (row['id']) {
            $("#id").val(row['id']);
            $("#question").val(row['question']);
            $("#answer").val(row['answer']);
            $("#status").val(row['status']);
            $("#sort_order").val(row['sort_order']);
            $("#action").val("update");
            scrollToDiv();
        }
    });

    $(document).on("click", ".toggle-status", function () {
        let id = $(this).data("id");
        let status = $(this).data("status");
        if (confirm("Are you sure you want to change the status?")) {
            $.ajax({
                type: 'POST',
                url: '{{ route("faqToggleStatus") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: status
                },
                success: function (response) {
                    if (response.status) {
                        successMessage(response.message, "reload");
                    } else {
                        errorMessage(response.message);
                    }
                },
                error: function () {
                    errorMessage("Request failed");
                }
            });
        }
    });

    $("#submitForm").on("submit", function () {
        let form = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '{{ route('faqSave') }}',
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
            error: function () {
                errorMessage("Request failed");
            }
        });
    });
</script>

@include('Dashboard.include.dataTablesScript')
@endsection
