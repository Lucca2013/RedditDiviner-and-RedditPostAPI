<?php
// ==== CONFIG ====
$client_id = "twLm7a5iZjHLLwyyLlcwiA";
$client_secret = "0GLeAgVsawwrQj-who1Xc4fQ2XhxvQ";
$user_agent = "PostAPI/1.0 by Classic_Row8854";

$ch = curl_init("https://www.reddit.com/api/v1/access_token");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERPWD => "$client_id:$client_secret",
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => "grant_type=client_credentials",
    CURLOPT_HTTPHEADER => ["User-Agent: $user_agent"]
]);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
$access_token = $data["access_token"] ?? null;

if (!$access_token) {
    http_response_code(500);
    die(json_encode(["error" => "Failed to obtain access token", "response" => $data]));
}

// ==== 2️⃣ Choose random subreddit ====
$subreddits = ["memes", "dankmemes", "me_irl", "funny", "wholesomememes"];
$subreddit = $_GET["subreddit"] ?? $subreddits[array_rand($subreddits)];

// ==== 3️⃣ Fetch posts (50 max) ====
$reddit_url = "https://oauth.reddit.com/r/$subreddit/hot.json?limit=50";

$ch = curl_init($reddit_url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: bearer $access_token",
        "User-Agent: $user_agent"
    ]
]);
$response = curl_exec($ch);
curl_close($ch);

$posts = json_decode($response, true);

// ==== 4️⃣ Filter posts with images ====
$memes = [];
foreach ($posts["data"]["children"] ?? [] as $post) {
    $p = $post["data"];
    $url = $p["url_overridden_by_dest"] ?? $p["url"] ?? "";

    if (preg_match("/\.(jpg|jpeg|png|gif)$/i", $url)) {
        $preview_list = [];

        if (isset($p["preview"]["images"][0]["resolutions"])) {
            foreach ($p["preview"]["images"][0]["resolutions"] as $res) {
                $link = html_entity_decode($res["url"]);
                $preview_list[] = $link;
            }
        }
        if (isset($p["preview"]["images"][0]["source"]["url"])) {
            $preview_list[] = html_entity_decode($p["preview"]["images"][0]["source"]["url"]);
        }

        $memes[] = [
            "postLink" => "https://redd.it/" . $p["id"],
            "subreddit" => $p["subreddit"],
            "title" => $p["title"],
            "url" => $url,
            "nsfw" => $p["over_18"],
            "spoiler" => $p["spoiler"],
            "author" => $p["author"],
            "ups" => $p["ups"],
            "preview" => $preview_list
        ];
    }
}

// ==== 5️⃣ Select X random memes ====
$posts = min($_GET["posts"] ?? 1, count($memes));
if ($posts > 0) {
    $random_keys = array_rand($memes, $posts);
    $random_memes = is_array($random_keys)
        ? array_intersect_key($memes, array_flip($random_keys))
        : [$memes[$random_keys]];
} else {
    $random_memes = [];
}

// ==== 6️⃣ Return JSON ====
header("Content-Type: application/json");
echo json_encode([
    "subreddit" => $subreddit,
    "count" => count($random_memes),
    "memes" => array_values($random_memes)
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>