<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contractor;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $contract = Contractor::orderBy('id', 'desc')->paginate(3);
        return view('frontend.index', compact('contract'));
    }

    public function project(){
        $contract = Contractor::orderBy('id', 'desc')->paginate(6);
        return view('frontend.projectview', compact('contract'));
    }


    public function projectView(Contractor $contractor){
        if($contractor){
            $project = Project::where('contractor_id', $contractor->id)->paginate(9);
            // dd($project);
            return view('frontend.project', compact('project'));
        }else{
            return back()->with('error1', 'project not found');
        }
    }


    public function projectDetails(Project $project){
        return view('frontend.project_details', compact('project'));
    }


    public function tableView(){
        $contractor = Contractor::orderBy('id', 'desc')->get();
        // if($contractor){
        //     $projectTable = Project::where('contractor_id', $contractor->id)->get();
        //     dd($projectTable);
        // }
        return view('frontend.table' , compact('contractor'));
    }

    public function getProjects(Request $request)
    {
        $contractor = Contractor::find($request->contractor_id);
        $projects = $contractor->projects;
    
        return response()->json($projects);
    }
    


    
    
    public function visualsView(){
            $projectCount = Project::getProjectCount();
            $awardCount = Project::getAwardCount();
            // $totalContractsCount = Project::getTotalContractsCount();
            $totalTendersAmount = Project::getTotalTendersAmount();
            $totalAwardsAmount = Project::getTotalAwardsAmount();
            $totalContractsAmount = Project::getTotalContractsAmount();
            $visuals = Project::with('contractor')->get();

            $data = Project::ofLastWeek();
            $chartData = [
                'labels' => $data->pluck('created_at')->toArray(),  // Example: Dates for x-axis
                'data' => $data->pluck('year')->toArray()          // Example: Values for y-axis
            ];

            // getBudgetByMonth
            $budgetData = Project::monthToDate();
            $budgetChartData = [
                'labels' => $budgetData->pluck('created_at')->toArray(),
                'data' => $budgetData->pluck('budget_amount')->toArray()
            ];

           // getProjectByCategory
            $projectData = Project::weekToDate()
            ->get()  
            ->groupBy('category', 'created_at')  
            ->map(function ($projects, $category) {
                return $projects->count();  
            });

            $projectChartData = [
            'labels' => $projectData->keys()->toArray(),  // Category names
            'data' => $projectData->values()->toArray()   // Project counts for each category
            ];

            // dd($budgetChartData);
            return view('frontend.visuals',[
                'visuals' => $visuals->count(),
                'projectCount' => $projectCount,
                'awardCount' => $awardCount,
                // 'totalContractsCount' => $totalContractsCount,
                'totalTendersAmount' => $totalTendersAmount,
                'totalAwardsAmount' => $totalAwardsAmount,
                'totalContractsAmount' => $totalContractsAmount,
                'chartData' => $chartData,
                'budgetByMonth' => $budgetChartData,
                'CategoryChart' => $projectChartData,
            ]);
        }
        
    
    
        private function getProjectByCategory(){
            // Get projects by category
            $projectsByCategory = Project::selectRaw('category, COUNT(*) as value')
                ->groupBy('category')
                ->pluck('category')
                ->toArray();
            return $projectsByCategory;
        }

}
