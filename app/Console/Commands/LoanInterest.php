<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Loan;
use App\Models\Interest;
use Carbon\Carbon;

class LoanInterest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:loanInterest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to calculates interest for all loans';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {       
            $loans = Loan::all();
            $current = Carbon::now();

            echo "\r\n";
            echo "\r\n";
            echo "***** MONTHLY INTEREST CHARGED ON {$current} *****";

        foreach($loans as $loan){

            $Loan_interest = Interest::find($loan->int_id);
            $current = Carbon::now()->format('Y-m-d');

            $interest_date = Carbon::parse($loan->interest_date);
            $current_date = Carbon::parse($current);

             if($interest_date->diffInDays($current) == 0 && $Loan_interest->interest_type == "compound"){

                $monthly_interest_rate = $Loan_interest->interest_rate/12;
                $interest = $loan->total_debt * $monthly_interest_rate;
                $newTotal_debt = $loan->total_debt + $interest;
                $newInterest_date = Carbon::parse($loan->interest_date)->addDays(30);

                echo "\r\n";
                echo "\r\n";
                echo "***********************************************************";

                echo "\r\n";
                echo "loan id ---- {$loan->id} ";
                // echo $loan->id;

                echo "\r\n";
                echo "total debt ---- {$loan->total_debt}";

                // $i = $loan->interest_rate/12;
                echo "\r\n";
                echo "monthly interest rate ---- {$monthly_interest_rate}";
                // $x = $loan->total_debt + $interest;
                echo "\r\n";
                echo "new total debt ---- {$newTotal_debt}";

                echo "\r\n";
                echo "next date to charge interest ---- {$current_date->addDays(30)}";

                echo "\r\n";
                echo "***********************************************************";

                    $updatedLoan = Loan::where('id', $loan->id)->update([
                        'total_debt' => $newTotal_debt,
                        'interest_date' => $newInterest_date
                    ]);
             }

             else if($interest_date->diffInDays($current) == 0 && $Loan_interest->interest_type == "simple"){

                $monthly_interest_rate = $Loan_interest->interest_rate/12;
                $interest = $loan->amount * $monthly_interest_rate;
                $newTotal_debt = $loan->total_debt + $interest;
                $newInterest_date = Carbon::parse($loan->interest_date)->addDays(30);

                echo "\r\n";
                echo "\r\n";
                echo "***********************************************************";

                echo "\r\n";
                echo "loan id ---- {$loan->id} ";
                // echo $loan->id;

                echo "\r\n";
                echo "total debt ---- {$loan->total_debt}";

                // $i = $loan->interest_rate/12;
                echo "\r\n";
                echo "monthly interest rate ---- {$monthly_interest_rate}";
                // $x = $loan->total_debt + $interest;
                echo "\r\n";
                echo "new total debt ---- {$newTotal_debt}";

                echo "\r\n";
                echo "next date to charge interest ---- {$current_date->addDays(30)}";

                echo "\r\n";
                echo "***********************************************************";

                    $updatedLoan = Loan::where('id', $loan->id)->update([
                        'total_debt' => $newTotal_debt,
                        'interest_date' => $newInterest_date
                    ]);
             }
        }
    }
}