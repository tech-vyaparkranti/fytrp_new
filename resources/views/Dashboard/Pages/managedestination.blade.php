@extends('layouts.dashboardLayout')
@section('title', 'Destination')
@section('content')

    <x-content-div heading="Manage Destination">
        <x-card-element header="Add Destination">
            <x-form-element method="POST" enctype="multipart/form-data" id="submitForm" action="javascript:">
                <x-input type="hidden" name="id" id="id" value=""></x-input>
                <x-input type="hidden" name="action" id="action" value="insert"></x-input>

                <x-input-with-label-element id="destination" label="Destination" placeholder="Destination"
                    name="destination" required></x-input-with-label-element>

                <x-input-with-label-element div_id="destination_image_div" id="destination_image" label="Destination Image" type="file" accept="image/*"
                placeholder="Destination Image" name="destination_image" required="true"></x-input-with-label-element>
                
                <x-text-area-with-label div_class="col-md-12 col-sm-12 mb-3" id="destination_details"
                placeholder="Destination Details" label="Destination Details" name="destination_details"  ></x-text-area-with-label>

                <!-- New Meta Title input -->
                <x-input-with-label-element id="meta_title" label="Meta Title" placeholder="Meta Title" name="meta_title"></x-input-with-label-element>

                <!-- New Meta Description textarea -->
                <x-text-area-with-label div_class="col-md-12 col-sm-12 mb-3" id="meta_description"
                placeholder="Meta Description" label="Meta Description" name="meta_description" ></x-text-area-with-label>

                <!-- New Meta Keywords input -->
                <x-input-with-label-element id="meta_keywords" label="Meta Keywords" placeholder="Meta Keywords" name="meta_keywords"></x-input-with-label-element>

                <x-input-with-label-element id="sorting_number" label="Sorting Number" type="numeric" minVal="1"
                    placeholder="Sorting Number" name="position" required="true"></x-input-with-label-element>

                <x-form-buttons></x-form-buttons>
            </x-form-element>

        </x-card-element>

        <x-card-element header="Destination Data">
            <x-data-table>

            </x-data-table>
        </x-card-element>
    </x-content-div>
@endsection

@section('script')

    <script type="text/javascript">
        $('#destination_details').summernote({
            placeholder: 'Destination Details',
            tabsize: 2,
            height: 100
        });
        let site_url = '{{ url('/') }}';
        let table = "";
        $(function() {

            table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    scrollX: true, // Ensure this is working
    ajax: {
        url: "{{ route('destinationData') }}",
        type: 'POST',
        data: {
            '_token': '{{ csrf_token() }}'
        }
    },
    columns: [
        { data: "DT_RowIndex", orderable: false, searchable: false, title: "Sr.No." },
        { data: 'id', name: 'id', title: 'Id', visible: false },
        { data: 'destination', name: 'destination', title: 'Destination' },
        {
            data: 'destination_image',
            render: function(data) {
                return data
                    ? `<img class="img-thumbnail" src="${site_url}${data}" />`
                    : '';
            },
            orderable: false,
            searchable: false,
            title: "Destination Image"
        },
        { data: 'destination_details',
         name: 'destination_details',
          title: 'Destination Details',
          render: function(data) {
        return data ? data : ''; // No need for escaping HTML tags
    }
           },
        { data: 'meta_title', name: 'meta_title', title: 'Meta Title' }, <!-- Add Meta Title Column -->
        { data: 'meta_description', name: 'meta_description', title: 'Meta Description' }, <!-- Add Meta Description Column -->
        { data: 'meta_keywords', name: 'meta_keywords', title: 'Meta Keywords' }, <!-- Add Meta Keywords Column -->
        { data: 'position', name: 'position', title: 'Destination Position' },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            title: 'Action'
        }
    ],
    order: [[1, "desc"]] // Default sort by ID descending
});

        });
        $(document).on("click", ".edit", function() {
            let row = $.parseJSON(atob($(this).data("row")));
            if (row['id']) {
                $("#destination_image_old_div").remove();
                $("#id").val(row['id']);
                $("#destination_image").prop("required",false);
                $("#destination").val(row['destination']);                
                $("#destination_image_div").parent().append(` 
                <div class="col-md-4 col-sm-12 mb-3" id="destination_image_old_div">
                    <label class="form-label" for="destination_image_old">Current Destination Image</label>            
                    <input class="form-control" type="image" src="${site_url+row['destination_image']}" id="destination_image_old" label="Destination Image Old"   >
                </div>`);
                $("#sorting_number").val(row['position']);
                $("#destination_details").html(row["destination_details"]);
                $('#destination_details').summernote('destroy');
                $("#destination_details").val(row["destination_details"]);
                $('#destination_details').summernote({
                    focus: true
                });
                
                // Set values for meta fields
                $("#meta_title").val(row['meta_title']);
                $("#meta_description").val(row['meta_description']);
                $("#meta_keywords").val(row['meta_keywords']);
                
                $("#action").val("update");

                scrollToDiv();
            } else {
                errorMessage("Something went wrong. Code 101");
            }
        });

        function Disable(id) {
            changeAction(id, "disable", "This item will be disabled!", "Yes, disable it!");
        }

        function Enable(id) {
            changeAction(id, "enable", "This item will be enabled!", "Yes, enable it!");
        }

        function changeAction(id, action, text, confirmButtonText) {
            if (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: confirmButtonText
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('saveDestinationMaster') }}',
                            data: {
                                id: id,
                                action: action,
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.status) {
                                    successMessage(response.message, true);
                                    table.ajax.reload();
                                } else {
                                    errorMessage(response.message);
                                }
                            },
                            failure: function(response) {
                                errorMessage(response.message);
                            }
                        });
                    }
                });
            } else {
                errorMessage("Something went wrong. Code 102");
            }
        }

        $(document).ready(function() {
            $("#submitForm").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('saveDestinationMaster') }}',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            successMessage(response.message, "reload");
                        } else {
                            errorMessage(response.message);
                        }
                    },
                    failure: function(response) {
                        errorMessage(response.message);
                    }
                });
            });
        });
    </script>
    @include('Dashboard.include.dataTablesScript')
@endsection
