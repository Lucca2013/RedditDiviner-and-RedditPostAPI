# RedditPostAPI
RedditPostAPI is an API that push random posts from reddit, things like subreddit or numbers of posts is customizable

API: https://reddit-diviner.vercel.app/api/pushreddit.php

Response example: 
```json
{
    "subreddit": "funny",
    "count": 1,
    "memes": [
        {
            "postLink": "https://redd.it/1opfxtb",
            "subreddit": "funny",
            "title": "Someone put Google eyes on this cookbook",
            "url": "https://i.redd.it/si0qintmbizf1.jpeg",
            "nsfw": false,
            "spoiler": false,
            "author": "williamthe3rdd",
            "ups": 28,
            "preview": [
                "https://preview.redd.it/si0qintmbizf1.jpeg?width=108&crop=smart&auto=webp&s=612adf37699291a2bc154cb5f866545b23e4bbd2",
                "https://preview.redd.it/si0qintmbizf1.jpeg?width=216&crop=smart&auto=webp&s=6b18c65a702b31100ea0b3869723b39c8767d6c6",
                "https://preview.redd.it/si0qintmbizf1.jpeg?width=320&crop=smart&auto=webp&s=fc41e1685a09239cef6a7183333648bec1375638",
                "https://preview.redd.it/si0qintmbizf1.jpeg?width=640&crop=smart&auto=webp&s=b8b2356827e0dcbf0e13c954dfdc6d78e1b1c997",
                "https://preview.redd.it/si0qintmbizf1.jpeg?width=960&crop=smart&auto=webp&s=9359a75c9ed0df5982cd5aa4e71df3acfd62c2b7",
                "https://preview.redd.it/si0qintmbizf1.jpeg?width=1080&crop=smart&auto=webp&s=6e83e045e65d989544ff57de8198f519423b57f3",
                "https://preview.redd.it/si0qintmbizf1.jpeg?auto=webp&s=cd588f2d7d6b5f0fef0abfcf2d76f1192f107cd9"
            ]
        }
    ]
}
```
## Customizable Endpoints
### You can set how many posts you want by adding ```?posts=int``` in the end. (MAX: 50)
```url
https://reddit-diviner.vercel.app/api/pushreddit.php?posts=2
```
In the example it will return:
```json
{
    "subreddit": "me_irl",
    "count": 2,
    "memes": [
        {
            "postLink": "https://redd.it/1oowy15",
            "subreddit": "me_irl",
            "title": "me_irl",
            "url": "https://i.redd.it/cqvvtawf9ezf1.jpeg",
            "nsfw": false,
            "spoiler": false,
            "author": "Lost10kOnGambling",
            "ups": 4551,
            "preview": [
                "https://preview.redd.it/cqvvtawf9ezf1.jpeg?width=108&crop=smart&auto=webp&s=0741afda5a904f648d179ff835084cbb947469c2",
                "https://preview.redd.it/cqvvtawf9ezf1.jpeg?width=216&crop=smart&auto=webp&s=dcc4a6546d3871fdcdbf270b6825bef574ed9db2",
                "https://preview.redd.it/cqvvtawf9ezf1.jpeg?width=320&crop=smart&auto=webp&s=68d6477e61e1493d5b43d64560f3445446b7cedb",
                "https://preview.redd.it/cqvvtawf9ezf1.jpeg?width=640&crop=smart&auto=webp&s=9839f7dc137f9c59a3ad7f6999c4a3681427ffb0",
                "https://preview.redd.it/cqvvtawf9ezf1.jpeg?auto=webp&s=bef14fe91627a0a706ab4429c640730d0a2a61ad"
            ]
        },
        {
            "postLink": "https://redd.it/1op794i",
            "subreddit": "me_irl",
            "title": "Me_irl",
            "url": "https://i.redd.it/lsv47zarrgzf1.png",
            "nsfw": false,
            "spoiler": false,
            "author": "chunkymunky_duhh05",
            "ups": 66,
            "preview": [
                "https://preview.redd.it/lsv47zarrgzf1.png?width=108&crop=smart&auto=webp&s=27126fbaf609e9fae4a85889685e7f322485b342",
                "https://preview.redd.it/lsv47zarrgzf1.png?width=216&crop=smart&auto=webp&s=2ee24e9001e71250f22ad2054e236a0121c13e58",
                "https://preview.redd.it/lsv47zarrgzf1.png?width=320&crop=smart&auto=webp&s=790317220438055fd4b94d8743fde54d96dfa12c",
                "https://preview.redd.it/lsv47zarrgzf1.png?width=640&crop=smart&auto=webp&s=76a9bc6cad045ef8b59c9e0e4875f7bc520d2404",
                "https://preview.redd.it/lsv47zarrgzf1.png?width=960&crop=smart&auto=webp&s=91b4cbb69db2e6ed86d3d9b59d2277e2e601219f",
                "https://preview.redd.it/lsv47zarrgzf1.png?width=1080&crop=smart&auto=webp&s=c1b6f15c3313d049b5259d826a0861e17c5e247d",
                "https://preview.redd.it/lsv47zarrgzf1.png?auto=webp&s=501d027564c2bd2e340b124ee46ae6bc0d2bd6fd"
            ]
        }
    ]
}
```

### You can set the subreddit the API will push by adding ```?subreddit=sub```
```url
https://reddit-diviner.vercel.app/api/pushreddit.php?subreddit=memes
```
In the example it will return:
```json
{
    "subreddit": "memes",
    "count": 1,
    "memes": [
        {
            "postLink": "https://redd.it/1ootyu5",
            "subreddit": "memes",
            "title": "Start stockpiling bottle caps, that\u2019s the next big thing\u2026possibly for more than one reason\u2026",
            "url": "https://i.redd.it/705zkiyjddzf1.jpeg",
            "nsfw": false,
            "spoiler": false,
            "author": "Metalsheepapocalypse",
            "ups": 15295,
            "preview": [
                "https://preview.redd.it/705zkiyjddzf1.jpeg?width=108&crop=smart&auto=webp&s=1eff5a8c9444e05b357a3441ad1e34455a007755",
                "https://preview.redd.it/705zkiyjddzf1.jpeg?width=216&crop=smart&auto=webp&s=647b8a4d9203df85396c96ab7d043fbcd216870c",
                "https://preview.redd.it/705zkiyjddzf1.jpeg?width=320&crop=smart&auto=webp&s=7d52f5119424a59d5966daf5e559ac2dc811c463",
                "https://preview.redd.it/705zkiyjddzf1.jpeg?width=640&crop=smart&auto=webp&s=5295acc8bde84f0b83cb96afd7f139db005498b0",
                "https://preview.redd.it/705zkiyjddzf1.jpeg?width=960&crop=smart&auto=webp&s=fd7c8aa9185389bf2115466db4933269f82cd8d1",
                "https://preview.redd.it/705zkiyjddzf1.jpeg?width=1080&crop=smart&auto=webp&s=429a1df2d4e7c1e8cb2d7963bae2354951aef982",
                "https://preview.redd.it/705zkiyjddzf1.jpeg?auto=webp&s=d916f18ad0372bca6852a96049241048cf7dfff1"
            ]
        }
    ]
}
```

### You can do both too OwO
```url
https://reddit-diviner.vercel.app/api/pushreddit.php?posts=2&subreddit=memes
```

## RedditPostAPI Made with 💘 by <a href="https://github.com/Lucca2013">Lucca</a>
