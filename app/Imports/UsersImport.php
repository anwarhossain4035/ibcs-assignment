<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('d-m-Y');
        $first_in_time = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['first_in_time'])->format('h:i:s');
        $last_out_time = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['last_out_time'])->format('h:i:s');

        return new Employee([
            'month'           => $row['month'],
            'date'            =>date('Y-m-d',strtotime($date)),
            'day'             => $row['day'],
            'employee_id'     => $row['employee_id'],
            'employee_name'   => $row['employee_name'],
            'department'      => $row['department'],
            'first_in_time'   => $first_in_time,
            'last_out_time'   => $last_out_time,
            'hours_of_work'   => $row['hours_of_work'],    

        ]);
    }
}
