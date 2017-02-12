<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
            input[type="submit"]{
                background: #0098cb;
                color:#fff;
                padding: 5px;
                border-radius: 2px;
            }
            form{
                background: #afafaf;
                color:#000;
                padding: 20px;
                margin: 20px auto
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
            @if(Session::has('success'))
                    {!! Session::get('success') !!}
                @endif
                <h3>Be right back. With upload</h3>
            {!! Form::open(array('url'=> '/up','files'=>true)) !!}
                <!--<input type="hidden" value="{{ csrf_token() }}" name="_token">-->
                <label>First name:</label>
                <input type="text" name="firstname">
                @if($errors->has('firstname'))
                    {!! $errors->first('firstname') !!}
                @endif
                    <br><label>Plz choose Your File:</label>
                    <input type="file" name="photo" id="file">
                    @if($errors->has('photo'))
                        {!! $errors->first('photo')!!}
                    @endif
                    <input type="submit" value="Upload" name="submit">
                   {!!Form::close()!!}
            </div>
        </div>
    </body>
</html>
