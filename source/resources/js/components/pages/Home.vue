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
import WriteTweet from "../components/WriteTweet";
import Tweet from "../components/Tweet.vue";
import HomeHeader from "../components/HomeHeader";
import ShowNewTweets from "../components/ShowNewTweets";
import axios from 'axios';

export default {
    name: "Home",
    components: {ShowNewTweets, HomeHeader, Tweet, WriteTweet},

    data: () => ({
        tweets: [],
        errors: [],
    }),

    created() {
        let data = axios.get('http://localhost/api/v1/tweets')
            .then(response => (this.tweets = response))
            .catch(e => {
                this.errors.push(e)
            })
    }
}
</script>
