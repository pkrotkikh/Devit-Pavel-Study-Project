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
                        <img src="/svg/create-tweet/globe.svg" class="tweet-globe-option">
                        <p class="float-left can-reply-option-text">Everyone can reply</p>
                    </div>

                    <div class="options-container">
                        <div class="clear-both">
                            <div class="tweet-option-icons">
                                <img src="/svg/create-tweet/select-image.svg">
                            </div>
                            <div class="tweet-option-icons">
                                <img src="/svg/create-tweet/select-gifs.svg">
                            </div>
                            <div class="tweet-option-icons">
                                <img src="/svg/create-tweet/graph.svg">
                            </div>
                        </div>

                        <div class="clear-both">
                            <div class="tweet-option-icons">
                                <img src="/svg/create-tweet/smile.svg">
                            </div>
                            <div class="tweet-option-icons">
                                <img src="/svg/create-tweet/calendar.svg">
                            </div>
                            <div class="tweet-option-icons">
                                <img src="/svg/create-tweet/geolocation.svg">
                            </div>
                        </div>

                        <input type="submit" class="tweet-submit-input float-right" value="Tweet">
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
