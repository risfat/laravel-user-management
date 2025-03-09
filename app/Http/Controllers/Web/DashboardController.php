<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Get monthly user registrations for the past 9 months
        $monthlyUsers = $this->getMonthlyUserRegistrations();

        // Get daily user activity for the past week
        $weeklyActivity = $this->getWeeklyUserActivity();

        // Get user statistics
        $stats = $this->getUserStatistics();

        return view('dashboard', compact('monthlyUsers', 'weeklyActivity', 'stats'));
    }

    private function getMonthlyUserRegistrations()
    {
        $months = collect([]);
        $userCounts = collect([]);

        // Get data for the last 9 months
        for ($i = 8; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months->push($date->format('M'));

            $count = User::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $userCounts->push($count);
        }

        return [
            'months' => $months,
            'counts' => $userCounts
        ];
    }

    private function getWeeklyUserActivity()
    {
        $days = collect([]);
        $logins = collect([]);
        $registrations = collect([]);

        // Get data for each day of the past week
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $days->push($date->format('D'));


            // This is just sample data
            $logins->push(rand(30, 70));

            $count = User::whereDate('created_at', $date->toDateString())->count();
            $registrations->push($count);
        }

        return [
            'days' => $days,
            'logins' => $logins,
            'registrations' => $registrations
        ];
    }

    private function getUserStatistics()
    {
        return [
            'total' => User::count(),
            'verified' => User::whereNotNull('email_verified_at')->count(),
            'unverified' => User::whereNull('email_verified_at')->count(),
            'thisMonth' => User::whereMonth('created_at', now()->month)->count(),
            'lastMonth' => User::whereMonth('created_at', now()->subMonth()->month)->count(),
            'growth' => $this->calculateGrowthRate()
        ];
    }

    private function calculateGrowthRate()
    {
        $thisMonth = User::whereMonth('created_at', now()->month)->count();
        $lastMonth = User::whereMonth('created_at', now()->subMonth()->month)->count();

        if ($lastMonth == 0) {
            return 100; // If there were no users last month, growth is 100%
        }

        return round((($thisMonth - $lastMonth) / $lastMonth) * 100, 1);
    }
}
