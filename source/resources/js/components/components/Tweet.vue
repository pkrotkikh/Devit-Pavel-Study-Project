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

<script>
import TweetReplyButton from "../UI/Buttons/TweetReplyButton";
import TweetRetweetButton from "../UI/Buttons/TweetRetweetButton";
import TweetLikeButton from "../UI/Buttons/TweetLikeButton";
import TweetShareButton from "../UI/Buttons/TweetShareButton";
export default {
    components: {TweetShareButton, TweetLikeButton, TweetRetweetButton, TweetReplyButton}
}
</script>
