<?php

namespace App\Console\Commands;

use App\Models\Question;
use Illuminate\Console\Command;
use Carbon\Carbon;

class IncreaseRank extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:increase-rank';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'increase a rank of question every day if there is no one solve it';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time = Carbon::now();
        $questions = Question::all();

        foreach ($questions as $question) {
            $end = Carbon::parse($question->created_at);
            $start = Carbon::parse($time);
            if ($end->diffInSeconds($start) >= 86400) {
                $question->rank++;
                $question->save();
            }
        }

        // $questions = Question::all();
        // foreach ($questions as $question) {
        //     if($question->rank ==1 && $question->getCreatedAtColumn - now() > 10){
        //         $question->rank++;
        //         $question->save();
        //     }

    }

}

