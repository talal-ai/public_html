<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Userroles;
use App\Models\Batchcreate;
use App\Models\BatchAdditionalInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BatchesController extends Controller
{

    public function batchcreate(Request $request)
    {
        // Log incoming request data
        \Log::info('Incoming request data:', $request->all());

        // Validate the incoming request
        $request->validate([
            'batchname' => 'required',
            'batchcode' => 'required',
            'description' => 'required',
            'selected_data' => 'required|json'
        ]);

        // Create a new batch entry with input values
        $batch = Batchcreate::create([
            'name' => $request->input('batchname'),
            'code' => $request->input('batchcode'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        $batchId = $batch->id; // Get the ID of the newly created batch

        // Process each item and insert into `batches_additional_info`
        $selectedData = json_decode($request->input('selected_data'), true);

        // Log the decoded selected data
        \Log::info('Decoded selected data:', $selectedData);

        foreach ($selectedData as $item) {
            // Check that batch_id is included in the array
            \Log::info('Inserting with batch_id:', ['batch_id' => $batchId, 'year_id' => $item['year_id'], 'program_id' => $item['program_id']]);

            BatchAdditionalInfo::create([
                'batch_id' => $batchId,
                'year_id' => $item['year_id'],
                'program_id' => $item['program_id'],
            ]);
        }

        // Redirect or return a response
        return redirect()->route('createbatch')->with('success', 'Batch Successfully Created');
    }





}
