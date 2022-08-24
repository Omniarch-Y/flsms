<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Loan;
use App\Models\Interest;
use App\Models\Saving;
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
            $loans = Loan::where('status','active')->get();
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
                $savings = Saving::find($loan->saving_id);
                $newRemaining_balance = $newTotal_debt - $savings->payed_amount;

                echo "\r\n";
                echo "\r\n";
                echo "***********************************************************";

                echo "\r\n";
                echo "loan id ---- {$loan->id} ";

                echo "\r\n";
                echo "total debt ---- {$loan->total_debt}";

                echo "\r\n";
                echo "required payment ---- {$savings->remaining_balance}";

                echo "\r\n";
                echo "monthly interest rate ---- {$monthly_interest_rate}";

                echo "\r\n";
                echo "interest type ---- {$Loan_interest->interest_type}";

                echo "\r\n";
                echo "new total debt ---- {$newTotal_debt}";

                echo "\r\n";
                echo "new required payment ---- {$newRemaining_balance}";

                echo "\r\n";
                echo "next date to charge interest ---- {$current_date->addDays(30)}";

                echo "\r\n";
                echo "***********************************************************";

                    $updatedLoan = Loan::find($loan->id)->update([
                        'total_debt' => $newTotal_debt,
                        'interest_date' => $newInterest_date
                    ]);

                    $updatedSavings = Saving::find($loan->saving_id)->update([
                        'remaining_balance' => $newRemaining_balance
                    ]);
             }

             else if($interest_date->diffInDays($current) == 0 && $Loan_interest->interest_type == "simple"){

                $monthly_interest_rate = $Loan_interest->interest_rate/12;
                $interest = $loan->amount * $monthly_interest_rate;
                $newTotal_debt = $loan->total_debt + $interest;
                $newInterest_date = Carbon::parse($loan->interest_date)->addDays(30);
                $savings = Saving::find($loan->saving_id);
                $newRemaining_balance = $newTotal_debt - $savings->payed_amount;

                echo "\r\n";
                echo "\r\n";
                echo "***********************************************************";

                echo "\r\n";
                echo "loan id ---- {$loan->id} ";

                echo "\r\n";
                echo "total debt ---- {$loan->total_debt}";

                echo "\r\n";
                echo "required payment ---- {$savings->remaining_balance}";

                echo "\r\n";
                echo "monthly interest rate ---- {$monthly_interest_rate}";

                echo "\r\n";
                echo "interest type ---- {$Loan_interest->interest_type}";

                echo "\r\n";
                echo "new total debt ---- {$newTotal_debt}";

                echo "\r\n";
                echo "new required payment ---- {$newRemaining_balance}";

                echo "\r\n";
                echo "next date to charge interest ---- {$current_date->addDays(30)}";

                echo "\r\n";
                echo "***********************************************************";

                    $updatedLoan = Loan::find($loan->id)->update([
                        'total_debt' => $newTotal_debt,
                        'interest_date' => $newInterest_date
                    ]);

                    $updatedSavings = Saving::find($loan->saving_id)->update([
                        'remaining_balance' => $newRemaining_balance
                    ]);

             }
        }
    }
}