@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Codes in Database</div>

                <div class="panel-body">
                    @if(count($result)>0)
                        <table width='100%' style='border:1px'> <tr><th>Email</th> <th>Code</th> </tr>  <tr><td>&nbsp</td></tr>
                        @foreach($result as $code)
                            
                            <tr>
                                <td width='30%'> {{$code->email}} </td> <td width='70%'>  {{$code->code}}</td>
                            </tr>
                            <tr> <td>&nbsp</td> </tr> 
                            <tr><td>&nbsp</td></tr>

                        @endforeach
                        </table>
                    

                    @else
                        <div style="color:green">Sorry there are no codes in the database</div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection