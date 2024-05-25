@extends('layouts.adminLayout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="fm-main-block">
                <iframe id="fm" src="{{ url('/file-manager/fm-button') }}"class="w-full h-full"></iframe>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set iframe height
            document.getElementById('fm').style.height = (window.innerHeight - 50) + 'px';

            // Handle messages from the file manager
            window.addEventListener('message', function(event) {
                if (event.origin !== window.location.origin) {
                    return;
                }

                const data = event.data;
                if (data.type === 'file:selected') {
                    window.opener.fmSetLink(data.url);
                    window.close();
                }
            });
        });
    </script>
@endsection
