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
                        <globe-icon class="tweet-globe-option" width="35" height="35"></globe-icon>
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

                        <input type="submit" class="tweet-submit-input float-right" value="Tweet">
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<style scoped>

.user-message-textarea {
    width: 100%;
    background-color: black;
    border: 0;
    color: white;
    font-size: 22px;
    height: 40px;
    min-width: 252px;
    min-height: 40px;
    max-height: 150px;
    overflow: auto;
}

.user-message-container {
    width: 80%;
    min-width: 240px;
    margin-left: 5px;
}

.write-tweet-text-container {
    width: 100%;
    height: 100%;
}

.write-tweet-text-container .user-avatar-container {
    text-align: center;
    width: 15%;
    min-width: 48px;
    height: 100%;
}

.user-avatar-container .user-avatar-image {
    width: 48px;
    height: 48px;
    border-radius: 50px;
}

.write-tweet-container {
    border: 1px  solid gray;
    border-top: 0;
    padding: 10px;
    width: 100%;
    display: block;
    overflow: auto;
}

.can-reply-option-container {
    color: #1d9bf0;
    border-bottom: 1px solid gray;
    height: auto;
    width: 100%;
    overflow: auto;
    display: block;
    margin-bottom: 20px;
    cursor: pointer;
}

.can-reply-option-text {
    margin-bottom: 0;
    line-height: 45px;
}

.tweet-submit-input {
    background-color: #1d9bf0;
    border-radius: 50px;
    padding: 5px 20px;
    border: 0;
    color: white;
    font-size: 18px;
}

.tweet-option-icons {
    padding: 5px 10px 0 10px;
    float: left;
    cursor: pointer;
}

.tweet-globe-option {
    filter: invert(47%) sepia(98%) saturate(2195%) hue-rotate(180deg) brightness(100%) contrast(89%);
    float: left;
    cursor: pointer;
    padding: 0 10px;
}

.float-left {
    float: left;
}
</style>

<script>
import GlobeIcon from "../UI/Icons/CreateTweet/GlobeIcon";
import SelectImageIcon from "../UI/Icons/CreateTweet/SelectImageIcon";
import SelectGifsIcon from "../UI/Icons/CreateTweet/SelectGifsIcon";
import BarchartIcon from "../UI/Icons/CreateTweet/BarchartIcon";
import SmileIcon from "../UI/Icons/CreateTweet/SmileIcon";
import CalendarIcon from "../UI/Icons/CreateTweet/CalendarIcon";
import GeolocationIcon from "../UI/Icons/CreateTweet/GeolocationIcon";
export default {
    components: {GeolocationIcon, CalendarIcon, SmileIcon, BarchartIcon, SelectGifsIcon, SelectImageIcon, GlobeIcon}
}
</script>
