@extends('layouts.dashboardLayout')
@section('title', 'Testimonials')
@section('content')

    <x-content-div heading="Manage Testimonials">
        <x-card-element header="Add Testimonial">
            <x-form-element method="POST" enctype="multipart/form-data" id="submitForm" action="javascript:">
                <x-input type="hidden" name="id" id="id" value=""></x-input>
                <x-input type="hidden" name="action" id="action" value="insert"></x-input>

                <x-input-with-label-element id="image" label="Upload Testimonial Image" name="image" type="file" accept="image/*"
                    ></x-input-with-label-element> {{-- UNCOMMENTED --}}

                <x-input-with-label-element id="heading_top" label="Testimonial Title"
                    name="heading_top"></x-input-with-label-element>

                <x-text-area-with-label id="heading_middle" label="Testimonial Content"
                    name="heading_middle"></x-text-area-with-label>

                <x-input-with-label-element id="heading_bottom" label="Testimonial Name" {{-- UNCOMMENTED --}}
                    name="heading_bottom"></x-input-with-label-element>

                <x-input-with-label-element id="testimonial_city" label="Testimonial City" {{-- ADDED --}}
                    name="testimonial_city"></x-input-with-label-element>

                <x-select-with-label id="slide_status" name="slide_status" label="Select Testimonial Status" required="true">
                    <option value="live">Live</option>
                    <option value="disabled">Disabled</option>
                </x-select-with-label>
                <x-input-with-label-element id="slide_sorting" label="Testimonial Sorting" type="numeric"
                name="slide_sorting"></x-input-with-label-element>

                <x-form-buttons></x-form-buttons>
            </x-form-element>

        </x-card-element>

        <x-card-element header="Testimonials Data">
            <x-data-table>

            </x-data-table>
        </x-card-element>
    </x-content-div>
@endsection

@section('script')
    <script type="text/javascript">
        let site_url = '{{ url('/') }}';
        let table = "";

        // Function to populate the testimonial form with data
        function populateTestimonialForm(data) {
            if (data && data.id) {
                $("#id").val(data.id);
                $("#heading_top").val(data.heading_top);
                $("#heading_middle").val(data.heading_middle);
                $("#heading_bottom").val(data.heading_bottom); // Add this for Testimonial Name
                $("#testimonial_city").val(data.testimonial_city); // Add this for City
                $("#slide_status").val(data.slide_status);
                $("#slide_sorting").val(data.slide_sorting);
                $("#action").val("update"); // Set action to 'update'
                $("#image").attr("required", false); // Image is not required on update
                // scrollToDiv(); // Assuming this function scrolls to the form
            } else {
                // If no data or invalid data, reset the form
                resetTestimonialForm();
                errorMessage("Something went wrong. Could not load data for editing.");
            }
        }

        // Function to reset the form to its initial 'insert' state
        function resetTestimonialForm() {
            $("#submitForm")[0].reset(); // Resets all form fields
            $("#id").val(""); // Clear ID
            $("#action").val("insert"); // Set action back to 'insert'
            $("#image").attr("required", true); // Image is required for new entries
            // Optionally, scroll to the form if you want to focus user on new entry
            // scrollToDiv();
        }

        $(function() {
            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "scrollX": true,
                ajax: {
                    url: "{{ route('testimonialData') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        title: "Sr.No."
                    },
                    {
                        data: '{{ \App\Models\TestimonialModel::ID }}',
                        name: '{{ \App\Models\TestimonialModel::ID }}',
                        title: 'Id',
                        visible: false
                    },
                    {
                        data: '{{ \App\Models\TestimonialModel::HEADING_TOP }}',
                        name: '{{ \App\Models\TestimonialModel::HEADING_TOP }}',
                        title: 'Testimonial Tite'
                    },
                    {
                        data: '{{ \App\Models\TestimonialModel::HEADING_MIDDLE }}',
                        name: '{{ \App\Models\TestimonialModel::HEADING_MIDDLE }}',
                        title: 'Testimonial Content'
                    },
                    // Add column for Testimonial Name
                    {
                        data: '{{ \App\Models\TestimonialModel::HEADING_BOTTOM }}', // Assuming you'll map this to heading_bottom in your model/controller
                        name: '{{ \App\Models\TestimonialModel::HEADING_BOTTOM }}',
                        title: 'Testimonial Name'
                    },
                    // Add column for Testimonial City
                    {
                        data: 'testimonial_city', // Make sure this matches your model/controller's output
                        name: 'testimonial_city',
                        title: 'Testimonial City'
                    },
                    {
                        data: '{{ \App\Models\TestimonialModel::SLIDE_STATUS }}',
                        name: '{{ \App\Models\TestimonialModel::SLIDE_STATUS }}',
                        title: 'Testimonial Status'
                    },
                    {
                        data: '{{ \App\Models\TestimonialModel::SLIDE_SORTING }}',
                        name: '{{ \App\Models\TestimonialModel::SLIDE_SORTING }}',
                        title: 'Testimonial Sorting'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: 'Action'
                    },
                ],
                order: [
                    [1, "desc"]
                ]
            });

            // Initialize the form to 'insert' state on page load
            resetTestimonialForm();
        });


        // Handle click on edit button (calls the new function)
        $(document).on("click", ".edit", function() {
            let row = $.parseJSON(atob($(this).data("row")));
            populateTestimonialForm(row);
        });

        // Your existing Disable/Enable functions
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
                            url: '{{ route('testimonialSaveSlide') }}',
                            data: {
                                id: id,
                                action: action,
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.status) {
                                    successMessage(response.message, true);
                                    table.ajax.reload(); // Reload DataTable
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


        // Handle form submission for Add/Update
        $(document).ready(function() {
            $("#submitForm").on("submit", function(e) { // Pass 'e' for event
                e.preventDefault(); // Prevent default form submission
                var form = new FormData(this);
                
                // Add CSRF token for all submissions
                form.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('testimonialSaveSlide') }}',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            successMessage(response.message, "reload");
                            // After successful INSERT, reset the form for next entry
                            if ($("#action").val() === "insert") {
                                resetTestimonialForm(); // Reset form after successful insert
                            }
                            table.ajax.reload(); // Reload DataTable after any submit (insert/update)
                        } else {
                            errorMessage(response.message);
                        }
                    },
                    error: function(xhr, status, error) { // Use 'error' for AJAX errors
                        let errorMessage = "An error occurred.";
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                            if (xhr.responseJSON.errors) { // For validation errors
                                for (let key in xhr.responseJSON.errors) {
                                    errorMessage += "\n" + xhr.responseJSON.errors[key].join(', ');
                                }
                            }
                        }
                        errorMessage(errorMessage);
                    }
                });
            });
        });
    </script>
    @include('Dashboard.include.dataTablesScript')
    {{-- @include('Dashboard.include.summernoteScript') --}}
@endsection