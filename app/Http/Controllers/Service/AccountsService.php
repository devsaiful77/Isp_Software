<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Debit;
use App\Models\Credit;
use App\Models\AccountsHead;
use App\Models\DrVoucher;

use Carbon\Carbon;
use DateTime;
use Session;

class AccountsService extends Controller
{
    // Debit
    public function insertDebitInformation($debit_head, $debit_remarks)
    {
        return Debit::insertGetId([
            'debit_head' => $debit_head,
            'debit_remarks' => $debit_remarks,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function getDebitInformation($id)
    {
        if ($id == null) {
            return Debit::where('debit_status', 1)->get();
        } else {
            return Debit::where('debit_id', $id)->first();
        }
    }

    public function updateDebitInformation($id, $debit_head, $debit_remarks)
    {
        return Debit::where('debit_id', $id)->update([
            'debit_head' => $debit_head,
            'debit_remarks' => $debit_remarks,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function deleteDebitInformation($id)
    {
        return Debit::where('debit_id', $id)->update([
            'debit_status' => 0,
        ]);
    }

    // Credit
    public function insertCreditInformation($credit_head, $credit_remarks)
    {
        return Credit::insertGetId([
            'credit_head' => $credit_head,
            'credit_remarks' => $credit_remarks,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function getCreditInformation($id)
    {
        if ($id == null) {
            return Credit::where('credit_status', 1)->get();
        } else {
            return Credit::where('credit_id', $id)->first();
        }
    }

    public function updateCreditInformation($id, $credit_head, $credit_remarks)
    {
        return Credit::where('credit_id', $id)->update([
            'credit_head' => $credit_head,
            'credit_remarks' => $credit_remarks,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function deleteCreditInformation($id)
    {
        return Credit::where('credit_id', $id)->update([
            'credit_status' => 0,
        ]);
    }


    // AccountsHead
    public function insertAccountsHeadInformation($account_head_title, $account_number)
    {
        return AccountsHead::insertGetId([
            'account_head_title' => $account_head_title,
            'account_number' => $account_number,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function getAccountsHeadInformation($id)
    {
        if ($id == null) {
            return AccountsHead::where('account_status', 1)->get();
        } else {
            return AccountsHead::where('account_id', $id)->first();
        }
    }

    public function updateAccountsHeadInformation($id, $account_head_title, $account_number)
    {
        return AccountsHead::where('account_id', $id)->update([
            'account_head_title' => $account_head_title,
            'account_number' => $account_number,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function deleteAccountsHeadInformation($id)
    {
        return AccountsHead::where('account_id', $id)->update([
            'account_status' => 0,
        ]);
    }


    // ======== Report Daly Cost ==========
    public function getOtherCostRecordByDateToDay($fromdate, $today)
    {
        $formateDate = new DateTime($fromdate);
        $today = new DateTime($today);
        return DrVoucher::where('approve_Status', 0)
            ->whereBetween('expenseDate', [$formateDate, $today])
            ->join('drebit_types', 'drebit_types.drTypeId', '=', 'dr_vouchers.drTypeId')
            ->join('months', 'months.month_id', '=', 'dr_vouchers.monthId')
            ->get();
    }

    public function getOthersCostTotalAmountByDateToDay($fromdate, $todate)
    {
        $fromdate = new DateTime($fromdate);
        $todate = new DateTime($todate);
        return DrVoucher::where('approve_Status', 0)
            // ->whereBetween('expenseDate', [$fromdate, $todate])
            // ->join('drebit_types', 'drebit_types.drTypeId', '=', 'dr_vouchers.drTypeId')
            // ->join('months', 'months.month_id', '=', 'dr_vouchers.monthId')
            ->sum('amount');
    }
}
