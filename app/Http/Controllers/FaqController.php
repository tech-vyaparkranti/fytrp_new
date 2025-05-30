<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Yajra\DataTables\Facades\DataTables;
class FaqController extends Controller
{
    /**
     * Show the FAQ management view.
     */
    public function index()
    {
        return view("Dashboard.Pages.faq");
    }

    /**
     * Handle DataTable server-side listing.
     */
    public function faqData(Request $request)
    {
        $data = Faq::select(['id', 'question', 'answer', 'status', 'sort_order']);

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $encodedRow = base64_encode(json_encode($row));

                $editBtn = '<button type="button" class="btn btn-sm btn-primary edit" data-row="' . $encodedRow . '">Edit</button>';
                $toggleText = $row->status ? 'Disable' : 'Enable';
                $toggleBtn = '<button type="button" class="btn btn-sm btn-warning toggle-status" data-id="' . $row->id . '" data-status="' . ($row->status ? 0 : 1) . '">' . $toggleText . '</button>';

                return $editBtn . ' ' . $toggleBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Store or update a FAQ entry.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort_order' => 'required|integer',
            'status' => 'required|boolean'
        ]);

        if ($request->action == 'update') {
            $faq = Faq::find($request->id);
            if (!$faq) {
                return response()->json(['status' => false, 'message' => 'FAQ not found.']);
            }
        } else {
            $faq = new Faq();
        }

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->sort_order = $request->sort_order;
        $faq->save();

        return response()->json(['status' => true, 'message' => 'FAQ saved successfully.']);
    }

    /**
     * Toggle FAQ status (Enable/Disable).
     */
    public function toggleStatus(Request $request)
    {
        $faq = Faq::find($request->id);

        if (!$faq) {
            return response()->json(['status' => false, 'message' => 'FAQ not found.']);
        }

        $faq->status = $request->status;
        $faq->save();

        return response()->json(['status' => true, 'message' => 'Status updated successfully.']);
    }
}
