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
        <div class="tweet-container">
            <div class="write-tweet-container">
                <div class="avatar-container">
                    <img src="/images/profile/1.jpeg" alt="" class="avatar-image">
                </div>

                <div class="message-container">
                    <textarea name="text"
                              oninput='this.style.height = ""; this.style.height = this.scrollHeight + "px"'
                              id="tweet-textarea"
                              class="message-textarea"
                              placeholder="What's happening?"></textarea>

                    <div class="can-reply-container">
                        <globe-icon class="globe-option"></globe-icon>
                        <p class="can-reply-text">Everyone can reply</p>
                    </div>

                    <div class="options-container">
                        <div class="options-row">
                            <div class="option-icon">
                                <select-image-icon width="24" height="24"></select-image-icon>
                            </div>
                            <div class="option-icon">
                                <select-gifs-icon width="24" height="24"></select-gifs-icon>
                            </div>
                            <div class="option-icon">
                                <barchart-icon width="24" height="24"></barchart-icon>
                            </div>
                        </div>

                        <div class="options-row">
                            <div class="option-icon">
                                <smile-icon width="24" height="24"></smile-icon>
                            </div>
                            <div class="option-icon">
                                <calendar-icon width="24" height="24"></calendar-icon>
                            </div>
                            <div class="option-icon">
                                <geolocation-icon width="24" height="24"></geolocation-icon>
                            </div>
                        </div>

                        <div class="tweet-submit-container">
                            <input type="submit" class="tweet-submit-input" value="Tweet">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<style scoped src="./writeTweet.scoped.css"></style>
