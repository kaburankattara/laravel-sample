<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h1>{{ $message }}</h1>
                <form action="/hoge/public/sample">
                    <span>サンプル番号：</span>
                    <input type="text" name="sampleId" size="8"/>
                    <input type="submit" value="検索"/>
                </form>
                @if (!$samples->isEmpty())
                <br/>
                <span>更新日：{{$samples->getDateTime()}}</span><br/>
                <table>
                    <tr style="background-color: #EEEEEE;">
                        <th>サンプル番号</th>
                        <th>ステータス</th>
                    </tr>
                    @foreach($samples->sampleList as $sample)
                    <tr>
                        <td><a href="/hoge/public/sampleDetail?sampleId={{$sample->id}}">{{$sample->id}}</a></td>
                        <td>{{$sample->getStatus()}}</td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </body>
</html>
