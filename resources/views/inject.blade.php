@if(config('console-log.enabled') && config('app.env')!=='production')
    <script>
        if (window.EventSource !== undefined) {
            const es = new EventSource('/stream');

            // Listen for incoming messages
            es.onmessage = function (event) {
                const data = JSON.parse(event.data);
                if (data['type'] !== 'table') {
                    console.log.apply(console, data['outputs']);
                } else {
                    console.table({...data['outputs']});
                }
            };

            // Handle any errors
            es.onerror = function (event) {
                // console.error('EventSource failed:', event);
            };
        } else {
            console.error('EventSource not supported');
        }
    </script>
@endif
