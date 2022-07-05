<template>
    <article class="tweet-container">
        <div class="write-tweet-text-container">
            <div class="float-left user-avatar-container">
                <img src="/images/profile/2.jpeg" alt="" class="user-avatar-image">
            </div>

            <div class="float-left user-message-container">
                <div class="user-message-row">
                    <p class="float-left user-message-paragraph user-name-text">Chris Hadfield</p>
                    <p class="float-left user-message-paragraph user-tag-text">@Cmdr_Hadfield</p>
                    <p class="float-left user-message-paragraph user-created-at-text">20h</p>
                </div>

                <div class="user-message-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci delectus dicta explicabo harum incidunt nisi totam voluptatem. Beatae commodi eligendi, est maiores natus voluptatibus. Ab aliquam consequuntur fuga illum!</p>

                    <div class="tweet-actions">
                        <tweet-reply-button></tweet-reply-button>
                        <tweet-retweet-button></tweet-retweet-button>
                        <tweet-like-button></tweet-like-button>
                        <tweet-share-button></tweet-share-button>
                    </div>
                </div>
            </div>
        </div>
    </article>
</template>

<style module>

.user-message-paragraph {
    margin-bottom: 0;
}

.user-message-container {
    width: 80%;
    min-width: 240px;
    margin-left: 5px;
}

.user-avatar-container .user-avatar-image {
    width: 48px;
    height: 48px;
    border-radius: 50px;
}

.tweet-container {
    border: 1px  solid gray;
    border-top: 0;
    padding: 10px;
    width: 100%;
    display: block;
    overflow: auto;
}

.write-tweet-text-container .user-avatar-container {
    text-align: center;
    width: 15%;
    min-width: 48px;
    height: 100%;
}

.float-left {
    float: left;
}

.write-tweet-text-container {
    width: 100%;
    height: 100%;
}

.user-name-text {
    padding-right: 10px;
    font-weight: bolder;
}

.user-message-row {
    width: 100%;
}

.user-tag-text {
    padding-right: 10px;
    color: gray;
}

.user-created-at-text {
    color: gray;
}

.user-message-text {
    clear: both
}
</style>

<script>
import TweetReplyButton from "../UI/Buttons/TweetReplyButton";
import TweetRetweetButton from "../UI/Buttons/TweetRetweetButton";
import TweetLikeButton from "../UI/Buttons/TweetLikeButton";
import TweetShareButton from "../UI/Buttons/TweetShareButton";
export default {
    components: {TweetShareButton, TweetLikeButton, TweetRetweetButton, TweetReplyButton}
}
</script>
