<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Reports
 * 
 * APIs for generating and managing reports
 */
class ReportController extends Controller
{
    /**
     * Get all reports
     * 
     * Get a list of generated reports
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response 200 {
     *     "status": "success",
     *     "data": {
     *         "reports": [
     *             {
     *                 "id": 1,
     *                 "name": "Report 1",
     *                 "report_type": "2022-01-01",
     *                 "to_date": "2022-01-01",
     *                 "created_by": 1
     *             }
     *         ]
     *     }
     * }
     * @response 400 {
     *     "status": "error",
     *     "message": [
     *         "The given data was invalid."
     *     ]
     * }
     * @response 401 {
     *     "status": "error",
     *     "message": [
     *         "Unauthenticated."
     *     ]
     * }
     ]
     }
     */
    public function index()
    {
        return Report::orderBy('id','desc')->paginate();
    }
    public function createReport(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'report_type' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'district' => 'optional',
            'agent_id' => 'optional',
            'product' => 'optional',
            'farm_size' => 'optional',
            'gender' => 'optional',
            'fpo_id' => 'optional',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors()->first()
            ], 400);
        }

        $report_data = [];
        $report_data['from_date'] = $request->from_date;
        $report_data['to_date'] = $request->to_date;
        $report_data['district'] = $request->district;
        $report_data['agent_id'] = $request->agent_id;
        $report_data['product'] = $request->product;
        $report_data['farm_size'] = $request->farm_size;
        $report_data['gender'] = $request->gender;
        $report_data['fpo_id'] = $request->fpo_id;

        //unset all empty fields from report data
        foreach ($report_data as $key => $value) {
            if (empty($value)) {
                unset($report_data[$key]);
            }
        }

        $params = json_encode($report_data);
        
        //Create report
        $report = Report::create([
            'name' => $request->name,
            'report_type' => $request->report_type,
            'report_params' => $params,
            'report_status' => 'pending',
            'created_by' => $request->user()->id
        ]);
        return response()->json([
            'status' => 'success',
            'data' => $report
        ], 200);

    }
}
