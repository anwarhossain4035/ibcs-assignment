<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    //  dd($row);
        return new Employee([
            'month'           => $row['month'],
            'date'            => $row['date'],
            'day'             => $row['day'],
            'employee_id'     => $row['employee_id'],
            'employee_name'   => $row['employee_name'],
            'Department'      => $row['department'],
            'first_in_time'    => $row['first_in_time'],
            'last_out_time'    => $row['last_out_time'],
            'hours_of_work'    => $row['hours_of_work'],
        ]);
    }
}
