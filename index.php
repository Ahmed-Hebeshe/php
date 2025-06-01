<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36\r\n"
        ]
    ];
    $context = stream_context_create($opts);
    $content = @file_get_contents($url, false, $context);
    echo $content ?: "⚠️ Failed to fetch content.";
} else {
    echo '<form method="get">
        <input name="url" placeholder="Enter URL to proxy" style="width:300px;">
        <button type="submit">Go</button>
    </form>';
}
