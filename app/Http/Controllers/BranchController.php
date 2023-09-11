<?php

namespace App\Http\Controllers;

use App\DataTables\BranchDataTable;
use App\Http\Requests\CreateBranchRequest;
use App\Models\Branch;
use App\Models\Business;
use App\Models\Day;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
    public function index(BranchDataTable $dataTable)
    {
        return $dataTable->render('branches.index');
    }

    public function create()
    {
        $businesses = Business::all();
        $days = Day::all();


        return view('branches.create', compact('businesses', 'days'));
    }

    public function store(CreateBranchRequest $request)
    {
        DB::beginTransaction();
        try{
            $validated = $request->validated();

            $branch = Branch::create([
                'name' =>  $validated['name'],
                'business_id' => $validated['business_id']
            ]);

            $days = $validated['day'];
            $startTimes = $validated['start_time'];
            $endTimes = $validated['end_time'];


            foreach ($days as $key => $dayId) {
                $branch->timings()->create([
                    'day_id' => $dayId,
                    'start_time' => $startTimes[$key],
                    'end_time' => $endTimes[$key],
                ]);
            }

            DB::commit();

            Session::flash('success', 'Branch created successfully.');
            return redirect()->route('branches.index');
        }catch (QueryException $e){
            DB::rollback();

            Session::flash('error', 'Something Went Wrong');
            return redirect()->route('branches.index');
        }catch (\Exception $e){
            DB::rollback();

            Session::flash('error', $e->getMessage());
            return redirect()->route('branches.index');
        }
    }

    public function show(Branch $branch)
    {

        $businesses = Business::all();
        $days = Day::all();

        return view('branches.show', compact('branch','businesses', 'days'));
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        Session::flash('success', 'Branch deleted successfully.');
        return redirect()->route('branches.index');
    }
}
