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
import WriteTweet from "../WriteTweet.vue";
import Tweet from "../Tweet.vue";
import HomeHeader from "../HomeHeader";
import ShowNewTweets from "../ShowNewTweets";
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

        console.log(12321312);
    }
}
</script>
