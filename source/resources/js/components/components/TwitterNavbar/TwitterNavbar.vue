<script>
import TwitterIcon from "../../UI/Icons/Navbar/TwitterIcon";
import HomeIcon from "../../UI/Icons/Navbar/HomeIcon";
import SearchIcon from "../../UI/Icons/Navbar/SearchIcon";
import BellIcon from "../../UI/Icons/Navbar/BellIcon";
import MessageIcon from "../../UI/Icons/Navbar/MessageIcon";
import BookmarkIcon from "../../UI/Icons/Navbar/BookmarkIcon";
import ListIcon from "../../UI/Icons/Navbar/ListIcon";
import MoreIcon from "../../UI/Icons/Navbar/MoreIcon";
import UserIcon from "../../UI/Icons/Navbar/UserIcon";
import FeatherIcon from "../../UI/Icons/Navbar/FeatherIcon";

export default {
    components: {
        FeatherIcon,
        UserIcon, MoreIcon, ListIcon, BookmarkIcon, MessageIcon, BellIcon, SearchIcon, HomeIcon, TwitterIcon
    },
    data() {
        return {
            navbarIcon: 'navbar-icon',
            width: 35,
            height: 35,
        }
    },
    mounted () {
        console.log(this.$style.red);
    },
}
</script>

<template>
    <ul class="list">
        <li class="navbar-li">
            <router-link class="link" to="/home">
                <twitter-icon class="icon" :width="width" :height="height"></twitter-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="link" to="/about">
                <home-icon class="icon" :width="width" :height="height"></home-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="link" to="/about">
                <search-icon class="icon" :width="width" :height="height"></search-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="link" to="/about">
                <bell-icon class="icon" :width="width" :height="height"></bell-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="link" to="/about">
                <message-icon class="icon" :width="width" :height="height"></message-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="link" to="/about">
                <bookmark-icon class="icon" :width="width" :height="height"></bookmark-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="link" to="/about">
                <list-icon class="icon" :width="width" :height="height"></list-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="link" to="/about">
                <user-icon class="icon" :width="width" :height="height"></user-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="link" to="/about">
                <more-icon class="icon" :width="width" :height="height"></more-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="link" to="/about">
                <feather-icon class="icon" :width="width" :height="height"></feather-icon>
            </router-link>
        </li>
    </ul>
</template>

<style scoped src="./twitterNavbar.scoped.css"></style>
