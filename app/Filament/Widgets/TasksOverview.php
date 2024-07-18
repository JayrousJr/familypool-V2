<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TasksOverview extends BaseWidget
{
    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        function todaysTasks()
        {
            $user = auth()->user();
            $currentDay = Carbon::now()->startOfDay();
            $todaysTask = DB::table('tasks');
            $todaysTask->where('created_at', '>=', $currentDay);
            if (!$user->isManager()) {
                $todaysTask->where('user_id', $user->id);
                $todaysTask->where('comments', "!=", "Completed");
            }
            $todayCount = $todaysTask->count();
            return $todayCount;
        }

        function completedTask()
        {
            $user = auth()->user();
            $currentDay = Carbon::now()->startOfDay();
            $todaysTask = DB::table('tasks');
            $todaysTask->where('created_at', '>=', $currentDay);
            if (!$user->isManager()) {
                $todaysTask->where('user_id', $user->id);
                $todaysTask->where('comments', "Completed");
            } else {
                $todaysTask->where('comments', "Completed");
            }
            $todayCount = $todaysTask->count();
            return $todayCount;
        }
        function allTasks()
        {
            $user = auth()->user();
            $todaysTask = DB::table('tasks');
            if (!$user->isManager()) {
                $todaysTask->where('user_id', $user->id);
            }
            $todayCount = $todaysTask->count();
            return $todayCount;
        }
        function todaysAllTasks()
        {
            $user = auth()->user();
            $currentDay = Carbon::now()->startOfDay();
            $todaysTask = DB::table('tasks');
            $todaysTask->where('created_at', '>=', $currentDay);
            if (!$user->isManager()) {
                $todaysTask->where('user_id', $user->id);
            }
            $todayCount = $todaysTask->count();
            return $todayCount;
        }
        return [
            Stat::make("Today's tasks", todaysTasks()),
            Stat::make("Today's Completed Tasks", completedTask()),
            Stat::make("Todays All Tasks", todaysAllTasks()),
            Stat::make('All Time Tasks', allTasks()),
        ];
    }
}
