<script type="text/javascript">
    window.onload = function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            $('#table').append(
                '<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />'
                );
            var url = $(this).attr('href');
            window.history.pushState("", "", url);
            loadItems(url);
        });

        function loadItems(url) {
            $.ajax({
                url: url
            }).done(function(data) {
                $('.items').html(data);
            }).fail(function() {
                console.log("Failed to load data!");
            });
        }

        window.onpopstate = function(e) {
            loadItems(location.href);
            }
    };
</script>
