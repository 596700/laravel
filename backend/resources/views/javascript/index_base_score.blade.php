<script>
    var baseScore = document.getElementsByClassName('base_score');
    // CVSSのBase Score値によってSeverityを書き換え
    
    for (i = 0; i < baseScore.length; i++) {
        var score = baseScore[i].innerHTML;

        if (9.0 <= score && score <= 10.0) {
            score += ' <span id="cvss_severity" class="badge badge-danger">Critical</span>';
        } else if (7.0 <= score && score <= 8.9) {
            score += ' <span id="cvss_severity" class="badge badge-warning">High</span>';
        } else if (4.0 <= score && score <= 6.9) {
            score += ' <span id="cvss_severity" class="badge badge-warning">Medium</span>';
        } else if (0.1 <= score && score <= 3.9) {
            score += ' <span id="cvss_severity" class="badge badge-warning">Low</span>';
        } else {
            score += ' <span id="cvss_severity" class="badge badge-dark">None</span>';
        }
        
        document.getElementsByClassName('base_score')[i].innerHTML = score;
    }
</script>
