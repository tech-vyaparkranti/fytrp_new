@extends('layouts.dashboardLayout')
@section('title', 'Blog')
@section('content')

    <x-content-div heading="Manage Blog">
        <x-card-element header="Add Blog Image">
            <x-form-element method="POST" enctype="multipart/form-data" id="submitForm" action="javascript:">
                <x-input type="hidden" name="id" id="id" value=""></x-input>
                <x-input type="hidden" name="action" id="action" value="insert"></x-input>

                <x-input-with-label-element id="image" label="Upload Blog Image" name="image" type="file" accept="image/*"
                    required></x-input-with-label-element>

                <x-input-with-label-element id="title" label="Blog title"
                    name="title" required></x-input-with-label-element>
                <x-text-area-with-label id="content" label="Blog Content"
                    name="content" required></x-text-area-with-label>
                    <x-input-with-label-element id="image2" label="Upload Blog Image" name="image2" type="file" accept="image/*"
                    required></x-input-with-label-element>
                    <x-input-with-label-element id="image3" label="Upload Blog Image" name="image3" type="file" accept="image/*"
                    required></x-input-with-label-element>
                    <x-text-area-with-label id="short_content" label="Blog Short Content"
                    name="short_content" required></x-text-area-with-label>
                <x-input-with-label-element id="blog_category" label="Blog Category"
                    name="blog_category"></x-input-with-label-element>
                    <x-input-with-label-element id="blog_date" label="Blog Date"
                            name="blog_date" type="date" required ></x-input-with-label-element>
                            <x-input-with-label-element id="meta_keyword" label="Meta Keyword"
                    name="meta_keyword"></x-input-with-label-element>
                    <x-input-with-label-element id="meta_title" label="Meta Title"
                    name="meta_title"></x-input-with-label-element>
                    <x-input-with-label-element id="meta_description" label="Meta Description"
                    name="meta_description"></x-input-with-label-element>
                <x-select-with-label id="blog_status" name="blog_status" label="Select Blog Status" required="true">
                    <option value="live">Live</option>
                    <option value="disabled">Disabled</option>
                </x-select-with-label>
                <x-input-with-label-element id="blog_sorting" required label="Blog Position" type="numeric"
                name="blog_sorting"></x-input-with-label-element>

                <x-form-buttons></x-form-buttons>
            </x-form-element>

        </x-card-element>

        <x-card-element header="Blog Data">
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
                    url: "{{ route('blogData') }}",
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
                        data: '{{ \App\Models\Blog::ID }}',
                        name: '{{ \App\Models\Blog::ID }}',
                        title: 'Id',
                        visible: false
                    },
                    {
                        data: '{{ \App\Models\Blog::IMAGE }}',
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
                        title: "Blog Image"
                    },
                    {
                        data: '{{ \App\Models\Blog::TITLE }}',
                        name: '{{ \App\Models\Blog::TITLE }}',
                        title: 'Blog Title'
                    },
                    {
                        data: 'content_row',
                        name: '{{ \App\Models\Blog::CONTENT }}',
                        title: 'Blog Content'
                    },
                    {
                        data: '{{ \App\Models\Blog::IMAGE2 }}',
                        render: function(data, type, row) {
                            let image2 = '';
                            if (data) {
                                image2 = '<img alt="Image Link" src="' + site_url + data +
                                    '" class="img-thumbnail">'
                            }
                            return image2;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Blog Image"
                    },
                    {
                        data: '{{ \App\Models\Blog::IMAGE3 }}',
                        render: function(data, type, row) {
                            let image3 = '';
                            if (data) {
                                image3 = '<img alt="Image Link" src="' + site_url + data +
                                    '" class="img-thumbnail">'
                            }
                            return image3;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Blog Image"
                    },
                    {
                        data: '{{ \App\Models\Blog::SHORT_CONTENT }}',
                        name: '{{ \App\Models\Blog::SHORT_CONTENT }}',
                        title: 'Blog Short Content'
                    },
                    {
                        data: '{{ \App\Models\Blog::BLOG_DATE }}',
                        name: '{{ \App\Models\Blog::BLOG_DATE }}',
                        title: 'Blog Date'
                    },
                    {
                        data: '{{ \App\Models\Blog::BLOG_CATEGORY }}',
                        name: '{{ \App\Models\Blog::BLOG_CATEGORY }}',
                        title: 'Blog Category'
                    },
                    {
                        data: '{{ \App\Models\Blog::META_KEYWORD }}',
                        name: '{{ \App\Models\Blog::META_KEYWORD }}',
                        title: 'Blog Meta Keyword'
                    },
                    {
                        data: '{{ \App\Models\Blog::META_TITLE }}',
                        name: '{{ \App\Models\Blog::META_TITLE }}',
                        title: 'Blog Meta Title'
                    },
                    {
                        data: '{{ \App\Models\Blog::META_DESCRIPTION }}',
                        name: '{{ \App\Models\Blog::META_DESCRIPTION }}',
                        title: 'Blog Meta Description'
                    },
                    {
                        data: '{{ \App\Models\Blog::BLOG_STATUS }}',
                        name: '{{ \App\Models\Blog::BLOG_STATUS }}',
                        title: 'Blog Status'
                    },
                    {
                        data: '{{ \App\Models\Blog::BLOG_SORTING }}',
                        name: '{{ \App\Models\Blog::BLOG_SORTING }}',
                        title: 'Blog Sorting'
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
                $("#image2").attr("required",false);
                $("#image3").attr("required",false);
                $("#title").val(row['title']);
                $("#blog_category").val(row['blog_category']);
                $("#meta_keyword").val(row['meta_keyword']);                              
                $("#meta_title").val(row['meta_title']);                              
                $("#meta_description").val(row['meta_description']); 
                $("#blog_date").val(row['blog_date']);                            
                $("#blog_status").val(row['blog_status']);
                $("#blog_sorting").val(row['blog_sorting']);
                $("#action").val("update");
                $("#content").val(row['content']);
                $('#content').summernote('destroy');
                $('#content').summernote({
                    focus: true
                });
                $("#short_content").val(row['short_content']);
                $('#short_content').summernote('destroy');
                $('#short_content').summernote({
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
                            url: '{{ route('saveBlog') }}',
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
                    url: '{{ route('saveBlog') }}',
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
