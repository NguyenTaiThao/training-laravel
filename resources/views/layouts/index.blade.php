<?php
$code = app('request')->input('code');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page1.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page6.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page7.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page8.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page9.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page10.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/page11.css') }}" rel="stylesheet" />
    <title>好きなベトナムの広告</title>
    <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header" style=" display:flex; align-items:center; justify-content:flex-end; padding:10px">
        <span>onlining user number: <b id="onlining-user-number">{{ $onlineNum }}</b></span>
    </div>
    <div class="content">
        <div class="side-bar">
            @for ($i = 1; $i <= 11; $i++)
                <div class="shortcut-box {{ $page === $i ? 'selected' : '' }}">
                    <span class="page-number" id="page-preview-{{ $i }}">{{ $i }}</span>
                    <span class="seeing-user" id='seeing-user-{{ $i }}'></span>
                    <a href="{{ route('page-' . $i) . '?code=' . $code }}">
                        <img src="{{ asset('assets/images/page' . $i . '.png') }}"
                            alt="page{{ $i }}-preview" class="screen-preview-img" />
                    </a>
                </div>
            @endfor
        </div>

        @yield('slide-content')

        <input type="hidden" id="hostname" value={{ env('APP_URL') }} />
        <input type="hidden" id="full-hostname" value={{ env('FULL_APP_URL') }} />
        <input type="hidden" id="pusher-app-key" value={{ env('PUSHER_APP_KEY') }} />
        <input type="hidden" id="pusher-cluster" value={{ env('PUSHER_APP_CLUSTER') }} />
        <input type="hidden" id="user-code" value={{ $code }} />
        <input type="hidden" id="online-data" value={{ $onlineData }} />

    </div>
    <div class="footer">
        <div class="button-group">
            <a href="{{ $prevPageNum !== null ? route('page-' . $prevPageNum) . '?code=' . $code : null }}"
                class="btn util-btn back-btn">
                前
            </a>
            <a href="{{ route('f-page-' . $page) . '?code=' . $code }}" class="btn util-btn zoom-btn">
                [Zoom]
            </a>
            <a href="{{ $nextPageNum !== null ? route('page-' . $nextPageNum) . '?code=' . $code : null }}"
                class="btn util-btn next-btn"> 次 </a>
        </div>
    </div>
</body>

</html>


<script type="text/javascript">
    $(document).ready(function() {
        var validNavigation = false;

        // Attach the event keypress to exclude the F5 refresh (includes normal refresh)
        $(document).bind('keypress', function(e) {
            if (e.keyCode == 116) {
                validNavigation = true;
            }
        });

        // Attach the event click for all links in the page
        $("a").bind("click", function() {
            validNavigation = true;
        });

        // Attach the event submit for all forms in the page
        $("form").bind("submit", function() {
            validNavigation = true;
        });

        // Attach the event click for all inputs in the page
        $("input[type=submit]").bind("click", function() {
            validNavigation = true;
        });

        window.addEventListener("beforeunload", function(e) {
            if (!validNavigation) {
                const code = document.getElementById('user-code').value
                const fullHostname = document.getElementById('full-hostname').value

                $.ajax(`${fullHostname}exit/${code}`, {
                    success: () => console.log("ok"),
                    error: () => console.log("not ok"),
                })
            }
        });

        const onlineData = JSON.parse(document.getElementById('online-data').value, true)
        console.log('onlineData', onlineData)
        let initPosition = []
        for (const code of Object.keys(onlineData)) {
            initPosition[onlineData[code]] = initPosition[onlineData[code]] ? [...initPosition[onlineData[
                code]], code] : [code]
        }
        for (let i = 1; i <= 11; i++) {
            if (!initPosition[i] || initPosition[i]?.length < 1) continue

            const element = document.getElementById(`seeing-user-${i}`)
            element.innerHTML = initPosition[i]?.map((e) => e.substring(0, 4)).join(' ')
        }

        try {
            const pusherAppKey = document.getElementById('pusher-app-key').value
            const pusherCluster = document.getElementById('pusher-cluster').value

            const pusher = new Pusher('f159efed1bbd62aca682', {
                cluster: 'ap1',
            });

            const channel = pusher.subscribe('online-channel')

            channel.bind('new-update', ({
                onlineUser
            }) => {
                let position = []

                onlining = Object.keys(onlineUser)
                document.getElementById('onlining-user-number').textContent = Object.keys(onlineUser)
                    .length;
                for (const code of Object.keys(onlineUser)) {
                    position[onlineUser[code]] = position[onlineUser[code]] ? [...position[onlineUser[
                        code]], code] : [code]
                }
                for (let i = 1; i <= 11; i++) {
                    const element = document.getElementById(`seeing-user-${i}`)

                    if (!position[i] || position[i]?.length < 1) {
                        element.innerHTML = ''
                        continue
                    }

                    element.innerHTML = position[i]?.map((e) => e.substring(0, 4)).join(' ')
                }
            })
        } catch (err) {
            console.log(err)
        }
    })
</script>
