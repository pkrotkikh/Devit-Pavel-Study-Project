<template>
    <div class="user-message-header-container">
        <h3 :class="{'float-left': true, 'user-message-header': true}">Home</h3>
        <div :class="[floatRight]">
            <stars-icon width="25" height="25"></stars-icon>
        </div>
    </div>
</template>

<script>
import StarsIcon from "../UI/Icons/CreateTweet/StarsIcon";
export default {
    components: {StarsIcon},

    data() {
        return {
            userMessageHeader: 'user-message-header',
            floatLeft: 'float-left',
            floatRight: 'float-right',
        }
    },
}
</script>
