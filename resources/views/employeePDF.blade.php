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
            @foreach ($allData as $data )
            <tr>
                <td align="center">{{$data->month}}</td>
                <td align="center">{{$data->date}}</td>
                <td align="center">{{$data->day}}</td>
                <td align="center">{{$data->employee_id}}</td>
                <td align="center">{{$data->employee_name}}</td>
                <td align="center">{{$data->department}}</td>
                <td align="center">
                  @if($data->first_in_time > $data->last_out_time)
                    <span style="background-color: red;">
                    {{$data->first_in_time}}
                    </span>
                  @endif
                </td>
                <td align="center">
                @if($data->first_in_time > $data->last_out_time)
                    <span style="background-color: yellow;">
                    {{$data->first_in_time}}
                    </span>
                  @endif
                </td>
                <td align="center">{{$data->hours_of_work}}</td>
            </tr>
            @endforeach
          
  
        </tbody>

    </table>
</body>
</html>