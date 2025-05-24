@extends('layouts.dashboardLayout')
@section('title', 'Manage New Letter')
@section('content')

    <x-dashboard-container container_header="Manage New Letter">
        
        <x-card>
            <x-card-header>News Letter Data</x-card-header>
            <x-card-body>
                <x-data-table></x-data-table>
            </x-card-body>
        </x-card>
    </x-dashboard-container>
@endsection

@section('script')
   
    <script type="text/javascript">
        $(document).ready(function () {
            // Initialize DataTable
            let table = $('.data-table').DataTable({
                dom: 'Bfrtip', // Show buttons for export
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getNewsLetterData') }}", // Backend route
                    type: 'POST',
                    data: function (d) {
                        d._token = '{{ csrf_token() }}'; // CSRF token for security
                    },
                    error: function (xhr) {
                        console.error("Error occurred while fetching data:", xhr.responseText);
                        alert("Failed to load data. Please try again.");
                    }
                },
                scrollX: true,
                order: [[0, 'desc']], // Order by "Id" column descending
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        title: "Sr.No."
                    },
                    {
                        data: 'id',
                        name: 'id',
                        title: "Id"
                    },
                    {
                        data: 'email_id',
                        name: 'email_id',
                        title: "Email Id",
                        width: "30%"
                    },
                    {
                        data: 'ip_address',
                        name: 'ip_address',
                        title: "IP Address",
                        width: "30%"
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        title: "Subscription Date",
                        width: "30%"
                    }
                ]
            });
        });
    </script>
    
    @include('Dashboard.include.dataTablesScript')
@endsection
