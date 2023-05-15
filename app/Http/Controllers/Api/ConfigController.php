<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function termAndCondition()
    {
        $term_condition = Content::where('content_type', '=', 'terms-and-conditions')->first();

        return response()->json([
            "success" => true,
            "message" => "Term and Condition",
            "data" => $term_condition
            ]);
    }
}
