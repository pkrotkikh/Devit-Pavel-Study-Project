<script>
import GlobeIcon from "../../UI/Icons/CreateTweet/GlobeIcon";
import SelectImageIcon from "../../UI/Icons/CreateTweet/SelectImageIcon";
import SelectGifsIcon from "../../UI/Icons/CreateTweet/SelectGifsIcon";
import BarchartIcon from "../../UI/Icons/CreateTweet/BarchartIcon";
import SmileIcon from "../../UI/Icons/CreateTweet/SmileIcon";
import CalendarIcon from "../../UI/Icons/CreateTweet/CalendarIcon";
import GeolocationIcon from "../../UI/Icons/CreateTweet/GeolocationIcon";
export default {
    components: {GeolocationIcon, CalendarIcon, SmileIcon, BarchartIcon, SelectGifsIcon, SelectImageIcon, GlobeIcon}
}
</script>

<template>
    <form action="">
        <div class="write-tweet-container">
            <div class="write-tweet-text-container">
                <div class="float-left user-avatar-container">
                    <img src="/images/profile/1.jpeg" alt="" class="user-avatar-image">
                </div>

                <div class="float-left user-message-container">
                    <textarea name="text"
                              oninput='this.style.height = ""; this.style.height = this.scrollHeight + "px"'
                              id="tweet-textarea"
                              class="user-message-textarea box-sizing-border"
                              placeholder="What's happening?"></textarea>

                    <div class="can-reply-option-container">
                        <globe-icon class="tweet-globe-option"></globe-icon>
                        <p class="float-left can-reply-option-text">Everyone can reply</p>
                    </div>

                    <div class="options-container">
                        <div class="clear-both">
                            <div class="tweet-option-icons">
                                <select-image-icon width="24" height="24"></select-image-icon>
                            </div>
                            <div class="tweet-option-icons">
                                <select-gifs-icon width="24" height="24"></select-gifs-icon>
                            </div>
                            <div class="tweet-option-icons">
                                <barchart-icon width="24" height="24"></barchart-icon>
                            </div>
                        </div>

                        <div class="clear-both">
                            <div class="tweet-option-icons">
                                <smile-icon width="24" height="24"></smile-icon>
                            </div>
                            <div class="tweet-option-icons">
                                <calendar-icon width="24" height="24"></calendar-icon>
                            </div>
                            <div class="tweet-option-icons">
                                <geolocation-icon width="24" height="24"></geolocation-icon>
                            </div>
                        </div>

                        <input type="submit" class="tweet-submit-input" value="Tweet">
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<style scoped src="./writeTweet.scoped.css"></style>
