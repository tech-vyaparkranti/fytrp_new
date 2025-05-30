<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AttractionController extends Controller
{
    public function index()
    {
            return view("Dashboard.Pages.attraction");
       
    }

    public function storeOrUpdate(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'status' => 'required|boolean',
            'sorting' => 'required|integer',
            'image' => $request->action === 'insert' ? 'required|image' : 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/attractions', 'public');
            $data['image'] = '/storage/' . $path;
        } elseif ($request->action === 'update') {
            unset($data['image']); // prevent overwriting with null
        }

        if ($request->action === 'update' && $request->id) {
            Attraction::find($request->id)->update($data);
            return response()->json(['status' => true, 'message' => 'Updated successfully']);
        } else {
            Attraction::create($data);
            return response()->json(['status' => true, 'message' => 'Created successfully']);
        }
    }

    public function datatable(Request $request)
    {
        $data = Attraction::query();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $row_json = base64_encode(json_encode($row));
                return '<button class="btn btn-sm btn-primary edit" data-row="' . $row_json . '">Edit</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
