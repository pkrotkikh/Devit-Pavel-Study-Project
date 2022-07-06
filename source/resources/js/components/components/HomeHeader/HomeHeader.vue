<script>
import StarsIcon from "../../UI/Icons/CreateTweet/StarsIcon";
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


<template>
    <div class="headerContainer">
        <h3 class="header float-left">Home</h3>
        <div class="float-right">
            <stars-icon class="icon"></stars-icon>
        </div>
    </div>
</template>


<style scoped src="./homeHeader.scoped.css"></style>
