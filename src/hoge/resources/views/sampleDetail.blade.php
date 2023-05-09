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
                <h1>サンプル詳細画面</h1>
                <form action="/sample" style="text-align:right;">
                    <input type="submit" value="一覧に戻る"/>
                </form>
                <div>
                    <table style="display:inline-block;">
                        <tr style="background-color: #EEEEEE;">
                            <th>種類</th>
                            <th>要素番号</th>
                            <th>ステータス</th>
                        </tr>
                        @foreach($sample->sampleElementList as $sampleElement)
                        @if (!$sampleElement->isFin())
                        <tr>
                        @endif
                        @if ($sampleElement->isFin())
                        <tr style="background-color: #C0C0C0;">
                        @endif
                            <td>{{$sampleElement->getTypeName()}}</td>
                            <td>{{$sampleElement->id}}</td>
                            <td>{{$sampleElement->getStatusName()}}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div style="display:inline-block;width:20px;">
                    </div>
                    <div style="display:inline-block;vertical-align:top;">
                        <p>{{$sample->getStatus()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
