<style>
    @media screen and (min-device-width : 320px) and (max-device-width : 480px) {
        #show_time {
            display: flex;
            flex-direction: column;
            margin-left: 90px;
        }

        #date {
            margin-left: 7px;
        }

        .user-name {
            display: block !important;
        }

        .header {
            position: fixed;
            height: 12% !important;
        }

        .bi-list {
            margin-left: 10px;
            margin-right: 10px;
        }
    }
</style>
<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <b><span class="weight-1000 font-16">Client IP: {{ $_SERVER['REMOTE_ADDR'] }}</span></b>
    </div>
    <div class="header-right my-auto">
        <div class="text-center font-16" style="flex: auto; display: flex;  align-items: center;">
            <div class="d-flex flex-direction-column" id="show_time">
                <div class="weight-600" id="date">{{ date('d/m/Y') }} &nbsp;</div>
                <div id="clock" class="weight-600"></div>
            </div>
        </div>
        <div class="user-info-dropdown my-auto">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <span class="micon bi bi-person-fill"></span>
                    </span>
                    <span class="user-name"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    {{-- <a class="dropdown-item" href=""><i class="dw dw-user1 pe-2"></i> Profile</a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="hidden" name="email" value="">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"><i
                                class="dw dw-logout pe-2"></i> Log Out</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    setInterval(showTime, 1000);

    function showTime() {
        let time = new Date();
        let hour = time.getHours();
        let min = time.getMinutes();
        let sec = time.getSeconds();
        am_pm = " AM";

        if (hour > 12) {
            hour -= 12;
            am_pm = " PM";
        }
        if (hour == 0) {
            hr = 12;
            am_pm = " AM";
        }
        hour = hour < 10 ? "0" + hour : hour;
        min = min < 10 ? "0" + min : min;
        sec = sec < 10 ? "0" + sec : sec;

        let currentTime = hour + ":" +
            min + ":" + sec + am_pm;

        document.getElementById("clock")
            .innerHTML = currentTime;
    }
    showTime();
</script>
