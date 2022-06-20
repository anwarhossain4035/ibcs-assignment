<!DOCTYPE html>
<html>
<head>
    <title>Employee Information Report</title>
</head>
<body>
     <table id="example" class="table table-striped" style="width:100%" border="1" >
     <br>
     <caption>Employee Information</caption>
        <thead>
            <tr>
                <th align="center">Month</th>
                <th align="center">Date</th>
                <th align="center">Day</th>
                <th align="center">Employee ID</th>
                <th align="center">Employee Name</th>
                <th align="center">Department</th>
                <th align="center">In Time </th>
                <th align="center">Out Time</th>
                <th align="center">Hours of Work</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($employeeList as $employee )
            @if ($employee->first_in_time > $inTime)
            <tr style="background-color: red; color:#e2e8f0">
                <td>{{$employee->month}}</td>
                <td>{{$employee->date}}</td>
                <td>{{$employee->day}}</td>
                <td>{{$employee->employee_id}}</td>
                <td>{{$employee->employee_name}}</td>
                <td>{{$employee->department}}</td>
              
                <td >{{$employee->first_in_time}}  </td>

                <td> {{$employee->last_out_time}} </td>
              
                <td>{{$employee->hours_of_work}}</td>
            </tr>
            @else
            <tr style="background-color: Yellow;">
                <td>{{$employee->month}}</td>
                <td>{{$employee->date}}</td>
                <td>{{$employee->day}}</td>
                <td>{{$employee->employee_id}}</td>
                <td>{{$employee->employee_name}}</td>
                <td>{{$employee->department}}</td>
              
                <td >{{$employee->first_in_time}}  </td>

                <td> {{$employee->last_out_time}} </td>
              
                <td>{{$employee->hours_of_work}}</td>
            </tr>
            @endif
           
            @endforeach
          
  
        </tbody>

    </table>
</body>
</html>