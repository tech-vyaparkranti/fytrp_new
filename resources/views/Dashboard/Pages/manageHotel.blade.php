@extends('layouts.dashboardLayout')
@section('title', 'Hotel')
@section('content')
    <x-dashboard-container container_header="Manage hotel">
        <x-card>
            <x-card-header>Add Hotel</x-card-header>
            <x-card-body>
                <x-form>
                    <x-input type="hidden" name="id" id="id" value=""></x-input>
                    <x-input type="hidden" name="action" id="action" value="insert"></x-input>

                    <x-input-with-label-element required name="hotel_name" id="hotel_name" placeholder="hotel Name"
                        label="hotel Name"></x-input-with-label-element>

                    <x-input-with-label-element name="hotel_image[]" id="hotel_image" type="file"
                        label="Upload hotel Image" placeholder="Images" accept="image/*"
                        multiple></x-input-with-label-element>
                    {{-- <x-input-with-label-element name="hotel_country[]" id="hotel_country" 
                        label="Hotel Country" placeholder="Hotel Country" ></x-input-with-label-element>                   --}}
                   
                    <x-text-area-with-label id="description" label="hotel Description"
                        name="description"></x-text-area-with-label>
                   
                    <x-input-with-label-element id="meta_keyword" label="Meta Keyword"
                    name="meta_keyword"></x-input-with-label-element>
                    <x-input-with-label-element id="meta_title" label="Meta Title"
                    name="meta_title"></x-input-with-label-element>
                    <x-input-with-label-element id="meta_description" label="Meta Description"
                    name="meta_description"></x-input-with-label-element>
                    <x-form-buttons></x-form-buttons>
                </x-form>
            </x-card-body>
        </x-card>
        <x-card>
            <x-card-header>hotels Data</x-card-header>
            <x-card-body>
                <x-data-table>
                </x-data-table>
            </x-card-body>
        </x-card>
    </x-dashboard-container>
   
@endsection

@section('script')

    @include('Dashboard.include.dataTablesScript')
    <script type="text/javascript">
        $('#description').summernote({
            placeholder: 'Description',
            tabsize: 2,
            height: 100
        });
 
        $(function() {
            $('.data-table').DataTable({
                processing: true, // Show a processing indicator
                serverSide: true, // Enable server-side processing
                scrollX: true, // Enable horizontal scrolling if needed
                ajax: {
                    url: "{{ route('hotelData') }}", // Laravel route for data
                    type: "POST", // Use POST method
                    data: {
                        _token: "{{ csrf_token() }}" // CSRF token
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", xhr.responseText); // Log AJAX errors
                        alert("Error loading data. Check the console for details.");
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        title: "Sr. No."
                    },
                    {
                        data: 'hotel_name',
                        name: 'hotel_name',
                        title: 'hotel Name'
                    },
                    


                    {
                        data: 'hotel_image', 
                        render: function(data, type, row) {
        let images = '';  

        if (data) {
            try {
                let cleanData = data.replace(/&quot;/g, '"');  
                if (!cleanData.startsWith('[') || !cleanData.endsWith(']')) {
                    cleanData = `[${cleanData}]`;
                }

                let imageArray = JSON.parse(cleanData);

                images += '<div style="display: flex; flex-wrap: wrap;">';

                imageArray.forEach(function(image) {
                   
                    images += '<img class="img-thumbnail" src="' + 'http://localhost/book365days_new/public/' +image+ '" alt="Image" style="width: 100px; margin-right: 5px; height: auto;">';
                });
            } 
            catch (e) {
                images = '<span class="text-danger">Invalid image data</span>';
            }
        }

        return images;  
    },
                        orderable: false,
                        searchable: false,
                        title: "Hotel image",
                        width: '30%'
}
, 
                                       
                    {
                        data: 'description',
                        name: 'description',
                        title: 'Description'
                    },
                   
                    {
                        data: 'meta_keyword',
                        name: 'meta_keyword',
                        title: 'Meta Keyword'
                    },
                    {
                        data: 'meta_title',
                        name: 'meta_title',
                        title: 'Meta Title'
                    },
                    // {
                    //     data: 'meta_description',
                    //     name: 'meta_description',
                    //     title: 'Meta Description'
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: 'Actions'
                    }
                ],
                order: [
                    [1, "desc"]
                ]
            });

            // Enable DataTables error logging
            $.fn.dataTable.ext.errMode = function(settings, helpPage, message) {
                console.error("DataTables Error:", message);
                alert("An error occurred while processing the table.");
            };
        });
      
        $(document).ready(function() {
           
            $("#submit_form").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('storeHotel') }}',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            successMessage(response.message, true);
                        } 
                        else {
                            errorMessage(response.message);
                        }
                    },
                    failure: function(response) {
                        errorMessage(response.message);
                    }
                });
            });
        });

        $(document).on("click", ".edit", function() {
            let row = $.parseJSON(atob($(this).data("row")));
            if (row['id']) {
                // $("#image_div").remove();
                $("#id").val(row['id']);
                $("#hotel_name").val(row['hotel_name']);
                $("#meta_keyword").val(row['meta_keyword']);
                $("#meta_title").val(row['meta_title']);
                $("#meta_description").val(row['meta_description']);
                $("#action").val("update");
                $("#image").prop("required",false);
                $("#description").text(row['description']);
                $("#description").val(row['description']);
                $('#description').summernote('destroy');
                $('#description').summernote({
                    focus: true
                });

                scrollToDiv();
            } else {
                errorMessage("Something went wrong. Code 101");
            }
        });
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
                            url: '{{ route('hotelAction') }}',
                            data: {
                                id: id,
                                action: action,
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if  (response.status) {
                                    successMessage(response.message, true);
                                    table.ajax.reload();
                                }
                                 else {
                                    errorMessage(response.message);
                                }
                            },
                            failure: function(response) {
                                console.log(response,'hello1');
                                errorMessage(response.message);
                            }
                            
                        });
                    }
                });
            } else {
                errorMessage("Something went wrong. Code 102");
            }
        }

        function Disable(id) {
            changeAction(id, "disable", "This item will be disabled!", "Yes, disable it!");
        }

        function Enable(id) {
            changeAction(id, "enable", "This item will be enabled!", "Yes, enable it!");
        }
    </script>

@endsection
