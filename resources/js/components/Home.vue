<template>
    <home-header></home-header>
    <write-tweet></write-tweet>
    <show-new-tweets></show-new-tweets>
    <tweet></tweet>
    <tweet></tweet>
    <tweet></tweet>
    <tweet></tweet>
    <tweet></tweet>
</template>

<script>
import WriteTweet from "./WriteTweet.vue";
import Tweet from "./Tweet.vue";
import HomeHeader from "./HomeHeader";
import ShowNewTweets from "./ShowNewTweets";
export default {
    name: "Home",
    components: {ShowNewTweets, HomeHeader, Tweet, WriteTweet},
}
</script>
