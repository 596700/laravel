<script>
    var baseScore = document.getElementById('base_score');
    // CVSSのBase Score値によってSeverityを書き換え

    if (9.0 <= baseScore.innerHTML && baseScore.innerHTML <= 10.0) {
        baseScore.innerHTML =
            '{{ $vulnerability->base_score }} <span id="cvss_severity" class="badge badge-danger">Critical</span>';
    } else if (7.0 <= baseScore.innerHTML && baseScore.innerHTML <= 8.9) {
        baseScore.innerHTML =
            '{{ $vulnerability->base_score }} <span id="cvss_severity" class="badge badge-warning">High</span>';
    } else if (4.0 <= baseScore.innerHTML && baseScore.innerHTML <= 6.9) {
        baseScore.innerHTML =
            '{{ $vulnerability->base_score }} <span id="cvss_severity" class="badge badge-warning">Medium</span>';
    } else if (0.1 <= baseScore.innerHTML && baseScore.innerHTML <= 3.9) {
        baseScore.innerHTML =
            '{{ $vulnerability->base_score }} <span id="cvss_severity" class="badge badge-warning">Low</span>';
    } else {
        baseScore.innerHTML =
            '{{ $vulnerability->base_score }} <span id="cvss_severity" class="badge badge-dark">None</span>';
    }

</script>
