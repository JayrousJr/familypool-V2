<?php

namespace App\Console\Commands;

use App\Models\AssignedTasks;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MarkAssignedTaskOverdue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:mark-overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The Task is Overdue';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expire = Carbon::now()->subMinutes(1);

        $task =  Task::where('created_at', '<', $expire)
            ->where("comments", "Not Performed")
            ->update(["comments" => "Overdue"]);

        $this->info("The task is overdue");
    }
}
