<script>
import ReplyOption from "../../UI/Icons/TweetOptions/ReplyOption";
import RetweetOption from "../../UI/Icons/TweetOptions/RetweetOption";
import LikeOption from "../../UI/Icons/TweetOptions/LikeOption";
import ShareOption from "../../UI/Icons/TweetOptions/ShareOption";
export default {
    components: {ReplyOption, RetweetOption, LikeOption, ShareOption}
}
</script>

<template>
    <article class="article">
        <div class="article-container">
            <div class="avatar-container">
                <img src="/images/profile/2.jpeg" alt="" class="avatar-img">
            </div>

            <div class="message-container">
                <div class="message-credentials">
                    <p class="credentials-p credentials-name">Chris Hadfield</p>
                    <p class="credentials-p credentials-tag">@Cmdr_Hadfield</p>
                    <p class="credentials-p credentials-created-at">20h</p>
                </div>

                <div class="message-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci delectus dicta explicabo harum incidunt nisi totam voluptatem. Beatae commodi eligendi, est maiores natus voluptatibus. Ab aliquam consequuntur fuga illum!</p>

                    <div class="tweet-actions">
                        <div class="action">
                            <reply-option class="action-icon"></reply-option>
                            <p class="action-counter">1</p>
                        </div>

                        <div class="action">
                            <retweet-option class="action-icon"></retweet-option>
                            <p class="action-counter">5</p>
                        </div>

                        <div class="action">
                            <like-option class="action-icon"></like-option>
                            <p class="action-counter">10</p>
                        </div>

                        <div class="action">
                            <share-option class="action-icon"></share-option>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</template>

<style scoped src="./tweet.scoped.css"></style>
