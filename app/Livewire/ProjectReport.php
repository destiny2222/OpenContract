<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\Contractor;

class ProjectReport extends Component
{
    public $contractors;
    public $contractor_id;
    public $projects = [];

    public function mount()
    {
        $this->contractors = Contractor::all();
        $this->projects = Project::all(); // Initially load all projects or leave empty
    }

    public function updatedContractorId()
    {
        // Fetch projects based on the selected contractor
        $this->projects = Project::where('contractor_id', $this->contractor_id)->get();
    }

    public function render()
    {
        return view('livewire.project-report');
    }
}
