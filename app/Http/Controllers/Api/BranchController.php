<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Models\Region;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function allBranches()
    {
        $items = Branch::all();
        return BranchResource::collection($items);
    }

    public function branchesByRegion($id)
    {
        $region = Region::findOrFail($id);
        $items = $region->branches;
        return BranchResource::collection($items);
    }
}
