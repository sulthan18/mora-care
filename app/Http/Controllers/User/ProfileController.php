<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ProfileController extends Controller
{
    public function index()
    {
        $residentId = auth()->user()->resident->id;

        $activeReports = Report::where('resident_id', $residentId)
            ->whereHas('reportStatuses', function ($query) {
                $query->where('status', '!=', 'completed');
            })->count();

        $completedReports = Report::where('resident_id', $residentId)
            ->whereHas('reportStatuses', function ($query) {
                $query->where('status', 'completed');
            })->count();

        return view('pages.app.profile', compact('activeReports', 'completedReports'));
    }
}
