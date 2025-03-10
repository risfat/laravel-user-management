<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'monthlyUsers' => $this->getMonthlyUserRegistrations(),
            'weeklyActivity' => $this->getWeeklyUserActivity(),
            'stats' => $this->getUserStatistics(),
        ];

        return response()->json($data);
    }

    private function getMonthlyUserRegistrations()
    {
        return User::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->take(9)
            ->get()
            ->reverse()
            ->values();
    }

    private function getWeeklyUserActivity()
    {
        // This is a placeholder. You might need to implement actual user activity tracking.
        $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        return [
            'logins' => array_map(function() { return rand(40, 100); }, $days),
            'actions' => array_map(function() { return rand(70, 150); }, $days),
        ];
    }

    private function getUserStatistics()
    {
        return [
            'totalUsers' => User::count(),
            'activeUsers' => User::where('email_verified_at', '!=', null)->count(),
            'newUsersThisMonth' => User::whereMonth('created_at', now()->month)->count(),
            'growthRate' => $this->calculateGrowthRate(),
        ];
    }

    private function calculateGrowthRate()
    {
        $currentMonthUsers = User::whereMonth('created_at', now()->month)->count();
        $lastMonthUsers = User::whereMonth('created_at', now()->subMonth()->month)->count();

        if ($lastMonthUsers == 0) {
            return 100; // Avoid division by zero
        }

        return round((($currentMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100, 2);
    }
}
