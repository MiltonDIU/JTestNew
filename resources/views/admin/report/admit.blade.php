    <style>
        #main{
            border: 1px solid #ccc;
            margin: 0;

            width: 99%;
            margin-top:50px;

        }
        #table tr{

            border-bottom: 1px solid #2e9ad0;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }
        table tr {
            border: 1px solid #F8F8F8;
            padding: 3px;
        }
        table th,
        table td {
            padding: 5px;
            text-align: left;
        }
        table th {
            font-size: 1px;
            letter-spacing: .1em;
            text-transform: uppercase;
        }
table td{
  font-size:15px;
}

    </style>

<table>
    <tr>
        <td>{!! Settings::config()['admit_message'] !!}</td>
    </tr>
</table>
