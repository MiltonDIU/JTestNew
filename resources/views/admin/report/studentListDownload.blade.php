<style>
    .main{width: 640px;
        float: left;}
    .box{width: 305px; border: 1px solid black; font-size: 22px; height: 85px; margin:15px 15px; text-align: center; display: inline-block; line-height: 30px; padding-top: 5px}
.box:first-child{margin-left: 20px;}

.header{width:100%; height:110px; text-align:center; font-size:30px; border-bottom:1px solid gray;}

</style>

<div class="main">
    
<div class="header" >
    {{$exam_level->title}}
</div>


@foreach($studentLists as $student)
    <div class="box">
        <strong> {{$student->user->name}}</strong><br>
        <strong>{{$student->role_number}}</strong>
    </div>
            &nbsp;
@endforeach
</div>
