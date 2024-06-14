<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=[&quot;your-google-map-api&quot;]&amp;libraries=places"></script>
<script src="{{asset('backend/dist/js/app.js')}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();
            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });

        function fmSetLink(url) {
            console.log(url)
            url = url.replace(/^.*\/\/[^\/]+/, ''); // remove domain
            console.log(url)
            if(inputId===''){
                const input_label ='image_label';
                const img_preview ='img_preview';
                document.getElementById(input_label).value = "/storage"+url;
                document.getElementById(img_preview).src= "/storage"+url;
            }
            else {
                const input_label ='image_label'+'-'+inputId;
                const img_preview ='img_preview'+'-'+inputId;
                document.getElementById(input_label).value ="/storage"+url;
                document.getElementById(img_preview).src="/storage"+url;
            }

        }



</script>
