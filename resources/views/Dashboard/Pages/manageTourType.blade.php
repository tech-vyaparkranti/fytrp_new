@extends('layouts.dashboardLayout')
@section('title', 'Tour')
@section('content')

    <x-content-div heading="Manage Tour ">
        <x-card-element header="Add Tour Image">
            <x-form-element method="POST" enctype="multipart/form-data" id="submitForm" action="javascript:">
                <x-input type="hidden" name="id" id="id" value=""></x-input>
                <x-input type="hidden" name="action" id="action" value="insert"></x-input>
                <x-input-with-label-element id="image" label="Upload Tour Image" name="image" type="file" accept="image/*"
                    required></x-input-with-label-element>
                    <x-input-with-label-element required name="title" label="Tour title" id="title" label_text="Tour title">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Tour title">
                    </x-input-with-label-element>
                {{-- <x-input-with-label-element id="title" label="Tour title"
                    name="title" required></x-input-with-label-element> --}}
                <x-text-area-with-label id="content" label="Tour Content"
                    name="content" required></x-text-area-with-label>
                    <x-input-with-label-element id="meta_keyword" label="Meta Keyword"
                    name="meta_keyword"></x-input-with-label-element>
                    <x-input-with-label-element id="meta_title" label="Meta Title"
                    name="meta_title"></x-input-with-label-element>
                    <x-input-with-label-element id="meta_description" label="Meta Description"
                    name="meta_description"></x-input-with-label-element>
                {{-- <x-input-with-label-element id="tour_date" label="Tour Date"
                        name="tour_date" type="date" required ></x-input-with-label-element> --}}
                <x-select-with-label id="tour_status" name="tour_status" label="Select Tour Status" required="true">
                    <option value="live">Live</option>
                    <option value="disabled">Disabled</option>
                </x-select-with-label>
                <x-input-with-label-element id="tour_sorting" required label="Tour Position" type="numeric"
                name="tour_sorting"></x-input-with-label-element>
                <x-form-buttons></x-form-buttons>
            </x-form-element>

        </x-card-element>

        <x-card-element header="Tour Data">
            <x-data-table>

            </x-data-table>
        </x-card-element>
    </x-content-div>
@endsection

@section('script')
    <script type="text/javascript">
      $('#content').summernote({
                placeholder: 'ElementText',
                tabsize: 2,
                height: 100
            });
        let site_url = '{{ url('/') }}';
        let table = "";
        $(function() {

            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "scrollX": true,
                ajax: {
                    url: "{{ route('tourData') }}",
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: 'Action'
                    },
                    {
                        data: '{{ \App\Models\Tour::ID }}',
                        name: '{{ \App\Models\Tour::ID }}',
                        title: 'Id',
                        visible: false
                    },
                    {
                        data: '{{ \App\Models\Tour::IMAGE }}',
                        render: function(data, type, row) {
                            let image = '';
                            if (data) {
                                image = '<img alt="Image Link" src="' + site_url + data +
                                    '" class="img-thumbnail">'
                            }
                            return image;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Tour Image"
                    },
                    {
                        data: '{{ \App\Models\Tour::TITLE }}',
                        name: '{{ \App\Models\Tour::TITLE }}',
                        title: 'Tour Title'
                    },
                    {
                        data: 'content_row',
                        name: '{{ \App\Models\Tour::CONTENT }}',
                        title: 'Tour Content'
                    },
                    {
                        data: '{{ \App\Models\Tour::META_KEYWORD }}',
                        name: '{{ \App\Models\Tour::META_KEYWORD }}',
                        title: 'Tour Meta Keyword'
                    },
                    {
                        data: '{{ \App\Models\Tour::META_TITLE }}',
                        name: '{{ \App\Models\Tour::META_TITLE }}',
                        title: 'Tour Meta Title'
                    },
                    {
                        data: '{{ \App\Models\Tour::META_DESCRIPTION }}',
                        name: '{{ \App\Models\Tour::META_DESCRIPTION }}',
                        title: 'Tour Meta Description'
                    },
                    {
                        data: '{{ \App\Models\Tour::TOUR_STATUS }}',
                        name: '{{ \App\Models\Tour::TOUR_STATUS }}',
                        title: 'Tour Status'
                    },
                    {
                        data: '{{ \App\Models\Tour::TOUR_SORTING }}',
                        name: '{{ \App\Models\Tour::TOUR_SORTING }}',
                        title: 'Tour Sorting'
                    },

                ],
                order: [
                    [2, "desc"]
                ]
            });

        });
        $(document).on("click", ".edit", function() {
            let row = $.parseJSON(atob($(this).data("row")));
            if (row['id']) {
                $("#id").val(row['id']);
                $("#image").attr("required",false);
                $("#title").val(row['title']);
                $("#meta_keyword").val(row['meta_keyword']);
                $("#meta_title").val(row['meta_title']);
                $("#meta_description").val(row['meta_description']);
                // $("#tour_date").val(row['tour_date']);
                $("#tour_status").val(row['tour_status']);
                $("#tour_sorting").val(row['tour_sorting']);
                $("#action").val("update");
                $("#content").val(row['content']);
                $('#content').summernote('destroy');
                $('#content').summernote({
                    focus: true
                });
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
                            url: '{{ route('saveTour') }}',
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
                    url: '{{ route('saveTour') }}',
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
    {{-- @include('Dashboard.include.summernoteScript') --}}
@endsection
