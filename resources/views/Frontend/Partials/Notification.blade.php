@if (session('success'))
    <div id="app_notification" class="bg-primary py-1">
        <div class="container">
            <div class="col-12 col-12 text-center text-white">
                {{ session('success') }}
            </div>
        </div>
    </div>
@elseif (session('error'))
    <div id="app_notification" class="bg-danger py-1">
        <div class="container">
            <div class="col-12 col-12 text-center text-white">
                {{ session('error') }}
            </div>
        </div>
    </div>
@elseif (session('warning'))
    <div id="app_notification" class="bg-warning py-1">
        <div class="container">
            <div class="col-12 col-12 text-center text-white">
                {{ session('warning') }}
            </div>
        </div>
    </div>
@endif
