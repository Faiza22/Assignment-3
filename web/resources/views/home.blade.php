@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Web IDE</div>

                <div class="panel-body">
                    <form action="/user" method="post"> {{ csrf_field() }}
                        <h4>Enter PHP code:</h4><br><br>
                        <center><textarea name="phpcode" style="height:100px; width:80%;"> {{$code}} </textarea></center>
                        <br><br>
                        <center><button type="submit">See Result</button></center>

                        <div>
                            <?php
                                if($code != NULL)
                                {
                                    if(preg_match("/sql/i",$code))
                                        echo "<div style='color:red'> <br><br>Sorry! Sql is a reserved word and cannot be used due to security purposes!</div>";
                                    else
                                    {
                                        echo "<h3>Result:</h3>";
                                        $code = trim ( $code );
                                        $code = ltrim( $code, '<?php' );
                                        $code = ltrim( $code, '<?' );
                                        $code = rtrim( $code, '?>' );
                                        echo eval($code);
                                    }
                                }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
