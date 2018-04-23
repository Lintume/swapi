<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SWAPI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .pagination a.item{
                margin: 2px;
                font-size: 23px;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/vue/1.0.28/vue.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.js"></script>

        <script type="text/javascript" src="http://cdn.jsdelivr.net/vue.table/1.5.3/vue-table.min.js"></script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
                <div id="app" class="ui vertical stripe segment">
                    <div class="ui container">
                        <div id="content" class="ui basic segment">
                            <h3 class="ui header">List of Users</h3>
                            <vuetable
                                    api-url="/api_swapi"
                                    table-wrapper="#content"
                                    :fields="columns"
                                    pagination-path=""
                                    {{--data-path="data"--}}
                            ></vuetable>
                        </div>
                    </div>
                </div>
        </div>
        <script>
            new Vue({
                el: '#app',
                data: {
                    columns: [
                        'name',
                        'height',
                        'mass',
                        'hair_color',
                        'skin_color',
                        'eye_color',
                        'birth_year',
                        'gender',
                        'homeworld',
                        'url',
                        'created',
                        'edited',
                        '__actions'
                    ]
                },
                methods: {
                    viewProfile: function(id) {
                        console.log('view profile with id:', id)
                    },
                },
                events: {
                    'vuetable:action': function(action, data) {
                        console.log('vuetable:action', action, data)
                        if (action == 'view-item') {
                            this.viewProfile(data.id)
                        }
                    },
                    'vuetable:load-error': function(response) {
                        console.log('Load Error: ', response)
                    }
                }
            })
        </script>
    </body>
</html>


