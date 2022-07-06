<script>
import WriteTweet from "../components/WriteTweet/WriteTweet";
import Tweet from "../components/Tweet/Tweet.vue";
import HomeHeader from "../components/HomeHeader/HomeHeader";
import ShowNewTweets from "../components/ShowNewTweets/ShowNewTweets";
import axios from 'axios';

export default {
    name: "Home",
    components: {ShowNewTweets, HomeHeader, Tweet, WriteTweet},

    data: () => ({
        tweets: [],
        errors: [],
    }),

    mounted() {
        let data = axios.get('http://localhost/api/v1/tweets')
            .then(response => (this.tweets = response.data))
            .catch(e => {
                this.errors.push(e)
            })
    },
}
</script>

<template>
    <home-header></home-header>
    <write-tweet></write-tweet>
    <show-new-tweets></show-new-tweets>
    <tweet v-for="tweet in this.tweets"
           :text="tweet.text"
           :author="tweet.author"
    ></tweet>
</template>

