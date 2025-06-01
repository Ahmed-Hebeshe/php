<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // مهلة 10 ثواني
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36");

    $content = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($content === false) {
        echo "⚠️ Failed to fetch content. Error: $err";
    } else {
        echo $content;
    }
} else {
    echo '<form method="get">
        <input name="url" placeholder="Enter URL to proxy" style="width:300px;">
        <button type="submit">Go</button>
    </form>';
}
