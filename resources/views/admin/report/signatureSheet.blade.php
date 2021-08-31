<style>
table
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
table td, table th
{
font-size:16px;
padding:3px 7px 2px 7px;
}
table th
{
font-size:16px;
text-align:left;
padding-top:5px;
padding-bottom:4px;
color:#000;
}
table tr.alt td
{
color:#000000;
background-color:#A9E2F3;
}
.table td, .table th
{
    border:1px solid grey;
}
table th, td{font-size:13px;}
</style>





<table border="0">
    <tr>

        <td style="font-size: 20px;width: 150px" colspan="2">{{$schedule->title}} <br>({{$exam_level->title}})</td>
        <td style="font-weight: bold; font-size: 20px">{{$schedule->exam_venue}}</td>
        <td style="text-align: right; width: 150px">Date:
            {{ date_create($schedule->exam_date)->format('d-m-Y')}}
        </td>
    </tr>
</table>
<br>
<table class="table">

    <tr>
        <th>Sl</th>
        <th>Name</th>
        <th>Application Number</th>
        <th>Picture</th>
        <th>Signature</th>
    </tr>
    @php
    $i=1;
    @endphp
    @foreach($studentLists as $list)
    <tr>

       <td style="width:5%">{{$i}}</td>
       <td style="width:33%">{{$list->user->name}}</td>
       <td style="width:20%">{{$list->role_number}}</td>
        <td style="width:12%">
            <img width="60" src="uploads/avatar/{{$list->user->profile->avatar}}" class="img-responsive pic-bordered" alt="">

        </td>
       <td style="width:30%"></td>
    </tr>
        @php
            $i++;
        @endphp
        @endforeach
</table>