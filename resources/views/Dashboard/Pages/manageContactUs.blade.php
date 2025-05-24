@extends('layouts.dashboardLayout')
@section('title', 'Manage Contact Us')
@section('content')

    <x-content-div heading="Manage Contact Us">
        <x-card-element header="Manage Contact Us Data">
            <x-data-table class="data-table"></x-data-table> <!-- Ensure the class matches in JS -->
        </x-card-element> 
    </x-content-div>
@endsection

@section('script')
@include('Dashboard.include.dataTablesScript')
    <script type="text/javascript">
        $(function() {
            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                scrollY: '400px',
                ajax: {
                    url: "{{ route('ContactUsData') }}",
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },  // CSRF token for POST request
                    error: function(xhr, error, code) {
                        console.log("DataTable error: ", error); // Log errors for troubleshooting
                    }
                },
                columns: [
                    { data: "DT_RowIndex", orderable: false, searchable: false, title: "Sr.No." },
                    { data: 'id', name: 'id', title: 'Id', visible: false },
                    { data: 'name', name: 'name', title: 'Name' },
                    { data: 'email', name: 'email', title: 'Email' },
                    { data: 'subject', name: 'subject', title: 'Subject' },
                    { data: 'message', name: 'message', orderable: false, searchable: false, title: 'Message' },
                    { data: 'created_at_date', name: 'created_at_date', orderable: false, searchable: false, title: 'Created Date' }
                ],
                order: [[1, "desc"]]
            });
        });
    </script>
@endsection
