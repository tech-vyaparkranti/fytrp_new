<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    use CommonFunctions;

    // Blog Slider View
    public function blogSlider()
    {
        return view("Dashboard.Pages.manageBlog");
    }

    // Blog Data for DataTables
    public function blogData()
    {
        try {
            $query = Blog::select([
                'image',
                'image2',
                'image3',
                'id',
                'title',
                'content',
                'short_content',
                'blog_date',
                'blog_category',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'blog_sorting',
                'blog_status',
            ]);
    
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn_disable = '<a href="javascript:void(0)" onclick="Disable(' . $row->id . ')" class="btn btn-danger btn-sm">Disable</a>';
                    $btn_enable = '<a href="javascript:void(0)" onclick="Enable(' . $row->id . ')" class="btn btn-primary btn-sm">Enable</a>';
    
                    return $row->blog_status == 'disabled'
                        ? $btn_edit . $btn_enable
                        : $btn_edit . $btn_disable;
                })
                ->addColumn('content_row', function ($row) {
                    return $this->getModal(
                        $row->id,
                        $row->content ?? " ",
                        'View Blog Details',
                        $row->title ?? "Blog Title"
                    );
                })
                
                ->rawColumns(['action', 'content', 'content_row'])
                ->make(true);
        } catch (Exception $exception) {
            dd([$exception->getMessage()]);
        }
    }
    

    // Save Blog
    public function saveBlog(BlogRequest $request)
    {
        try {
            switch ($request->input("action")) {
                case "insert":
                    $return = $this->insertBlog($request);
                    break;
                case "update":
                    $return = $this->updateBlog($request);
                    break;
                case "enable":
                case "disable":
                    $return = $this->enableDisableBlog($request);
                    break;
                default:
                    $return = ["status" => false, "message" => "Unknown action", "data" => ""];
            }
        } catch (Exception $exception) {
            $return = $this->reportException($exception);
        }
        return response()->json($return);
    }

    // Insert Blog
    public function insertBlog(BlogRequest $request)
    {
        $imageUpload = $this->blogImageUpload($request);

        if ($imageUpload["status"]) {
            $Blog = new Blog();
            $Blog->{Blog::IMAGE} = $imageUpload["data"]["image"];
            $Blog->{Blog::IMAGE2} = $imageUpload["data"]["image2"];
            $Blog->{Blog::IMAGE3} = $imageUpload["data"]["image3"];
            $Blog->{Blog::TITLE} = $request->input(Blog::TITLE);
            $Blog->{Blog::CONTENT} = $request->input(Blog::CONTENT);
            $Blog->{Blog::SHORT_CONTENT} = $request->input(Blog::SHORT_CONTENT);
            $Blog->{Blog::BLOG_DATE} = $request->input(Blog::BLOG_DATE);
            $Blog->{Blog::BLOG_CATEGORY} = $request->input(Blog::BLOG_CATEGORY);
            $Blog->{Blog::META_TITLE} = $request->input(Blog::META_TITLE);
            $Blog->{Blog::META_KEYWORD} = $request->input(Blog::META_KEYWORD);
            $Blog->{Blog::META_DESCRIPTION} = $request->input(Blog::META_DESCRIPTION);
            $Blog->{Blog::BLOG_SORTING} = $request->input(Blog::BLOG_SORTING);
            $Blog->{Blog::BLOG_STATUS} = $request->input(Blog::BLOG_STATUS);
            $Blog->{Blog::STATUS} = 1;
            $Blog->{Blog::CREATED_BY} = Auth::user()->id;
            $Blog->save();

            $this->forgetSlides();
            $return = ["status" => true, "message" => "Saved successfully", "data" => null];
        } else {
            $return = $imageUpload;
        }

        return $return;
    }

    // Blog Image Upload
    public function blogImageUpload(BlogRequest $request)
    {
        $maxId = Blog::max(Blog::ID) + 1;
        $timeNow = strtotime($this->timeNow());
        $uniqueId = "{$maxId}_{$timeNow}";

        $images = ["image", "image2", "image3"];
        $uploadedImages = [];

        foreach ($images as $imageField) {
            if ($request->hasFile($imageField)) {
                $upload = $this->uploadLocalFile($request, $imageField, "/website/uploads/blog/", "{$imageField}_{$uniqueId}");
                if ($upload["status"]) {
                    $uploadedImages[$imageField] = $upload["data"];
                } else {
                    return $upload; // Return error if any upload fails
                }
            } else {
                $uploadedImages[$imageField] = null; // If no file is provided
            }
        }

        return ["status" => true, "data" => $uploadedImages];
    }

    // Update Blog
    public function updateBlog(BlogRequest $request)
    {
        $check = Blog::where([Blog::ID => $request->input(Blog::ID), Blog::STATUS => 1])->first();

        if ($check) {
            $imageUpload = $this->blogImageUpload($request);

            if ($imageUpload["status"]) {
                foreach (["image", "image2", "image3"] as $field) {
                    if ($imageUpload["data"][$field]) {
                        $check->{strtoupper($field)} = $imageUpload["data"][$field];
                    }
                }
            }

            $check->{Blog::TITLE} = $request->input(Blog::TITLE);
            $check->{Blog::CONTENT} = $request->input(Blog::CONTENT);
            $check->{Blog::SHORT_CONTENT} = $request->input(Blog::SHORT_CONTENT);
            $check->{Blog::BLOG_DATE} = $request->input(Blog::BLOG_DATE);
            $check->{Blog::BLOG_CATEGORY} = $request->input(Blog::BLOG_CATEGORY);
            $check->{Blog::META_TITLE} = $request->input(Blog::META_TITLE);
            $check->{Blog::META_KEYWORD} = $request->input(Blog::META_KEYWORD);
            $check->{Blog::META_DESCRIPTION} = $request->input(Blog::META_DESCRIPTION);
            $check->{Blog::BLOG_SORTING} = $request->input(Blog::BLOG_SORTING);
            $check->{Blog::BLOG_STATUS} = $request->input(Blog::BLOG_STATUS);
            $check->{Blog::UPDATED_BY} = Auth::user()->id;
            $check->save();

            $this->forgetSlides();
            $return = ["status" => true, "message" => "Updated successfully", "data" => null];
        } else {
            $return = ["status" => false, "message" => "Details not found", "data" => null];
        }

        return $return;
    }

    // Enable or Disable Blog
    public function enableDisableBlog(BlogRequest $request)
    {
        $check = Blog::find($request->input(Blog::ID));

        if ($check) {
            $check->{Blog::UPDATED_BY} = Auth::user()->id;
            $check->{Blog::BLOG_STATUS} = $request->input("action") == "enable"
                ? Blog::BLOG_STATUS_LIVE
                : Blog::BLOG_STATUS_DISABLED;

            $check->save();
            $this->forgetSlides();

            $return = ["status" => true, "message" => ucfirst($request->input("action")) . "d successfully.", "data" => ""];
        } else {
            $return = ["status" => false, "message" => "Details not found.", "data" => ""];
        }

        return $return;
    }
}
