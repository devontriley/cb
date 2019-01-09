/*
1. Return youtube/vimeo player object
2. Methods to control video options
 */

class videoLoader
{
    constructor()
    {
        console.log('test');

        this.videoPlayer = null;

        if(!window.YT) {
            // Create and load youtube api script
            this.loadYoutubeAPI();
        }

        return this.videoPlayer;
    }

    loadYoutubeAPI(callback)
    {
        // First script tag reference to insert youtube script before
        const firstScriptTag = document.getElementsByTagName('script')[0];

        // Create empty script element
        let youtubePlayerScript = document.createElement('script');

        // Add src to load youtube api
        youtubePlayerScript.src = "https://www.youtube.com/iframe_api";

        // Insert youtube script before first script on page
        firstScriptTag.parentNode.insertBefore(youtubePlayerScript, firstScriptTag);

        // Create youtube videos when script is ready
        window.onYouTubeIframeAPIReady = this.createPlayer({
            'ele': null,
            'width': null,
            'height': null,
            'playerVars': {
                'autoplay': 0,
                'controls': 0,
                'modestbranding': 0,
                'rel': 0
            }
        });
    }

    createPlayer(playerInfo)
    {
        return new YT.Player(playerInfo.ele, {
            height: playerInfo.height,
            width: playerInfo.width,
            videoId: playerInfo.videoId,
            playerVars: playerInfo.playerVars
        });
    }
}

const videos = document.querySelectorAll('.video-embed__video');
if(videos)
{
    const videosArr = [];

    for(var i = 0; i < videos.length; i++)
    {
        videosArr.push(new videoLoader());
    }

    console.log(videosArr);
}

// Vimeo
// var vimeoVideosList = [];
// loadVideos('Vimeo');
//
// var vimeoPlayerScript = document.createElement('script');
// vimeoPlayerScript.src = 'https://player.vimeo.com/api/player.js';
// vimeoPlayerScript.async = false;
// vimeoPlayerScript.addEventListener('load', function(){
//     onVimeoReady();
// });
//
// firstScriptTag.parentNode.insertBefore(vimeoPlayerScript, firstScriptTag);
//
// function createVimeoPlayer(playerInfo) {
//     return new Vimeo.Player(playerInfo.ele, {
//         'id': playerInfo.videoID,
//         'width': playerInfo.width,
//         'loop': false
//     });
// }
//
// function onVimeoReady() {
//     if(!vimeoVideosList) return;
//
//     for(var i = 0; i < vimeoVideosList.length; i++) {
//         var curplayer = createVimeoPlayer(vimeoVideosList[i]);
//     }
//
//     $('.c-media-module__video').fitVids();
// }


// Load More Videos
// $('.c-media-module__load-more').on('click', function(e) {
//     e.preventDefault();
//
//     var container = $(this).parents('.c-media-module__video-category');
//     var ids = container.attr('data-ids');
//     var offset = container.attr('data-offset');
//
//     console.log(ids, offset);
// });