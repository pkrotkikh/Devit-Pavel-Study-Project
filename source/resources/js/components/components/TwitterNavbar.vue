<template>
    <ul class="navbar-ul">
        <li class="navbar-li">
            <router-link class="navbar-link" to="/home">
                <twitter-icon :width="35" :height="35"></twitter-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="navbar-link" to="/about">
                <home-icon :width="35" :height="35"></home-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="navbar-link" to="/about">
                <search-icon :width="35" :height="35"></search-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="navbar-link" to="/about">
                <bell-icon :width="35" :height="35"></bell-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="navbar-link" to="/about">
                <message-icon :width="35" :height="35"></message-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="navbar-link" to="/about">
                <bookmark-icon :width="35" :height="35"></bookmark-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="navbar-link" to="/about">
                <list-icon :width="35" :height="35"></list-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="navbar-link" to="/about">
                <user-icon :width="35" :height="35"></user-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="navbar-link" to="/about">
                <more-icon :width="35" :height="35"></more-icon>
            </router-link>
        </li>
        <li class="navbar-li">
            <router-link class="navbar-link" to="/about">
                <feather-icon :width="35" :height="35"></feather-icon>
            </router-link>
        </li>
    </ul>
</template>
<script>
import TwitterIcon from "../UI/Icons/Navbar/TwitterIcon";
import HomeIcon from "../UI/Icons/Navbar/HomeIcon";
import SearchIcon from "../UI/Icons/Navbar/SearchIcon";
import BellIcon from "../UI/Icons/Navbar/BellIcon";
import MessageIcon from "../UI/Icons/Navbar/MessageIcon";
import BookmarkIcon from "../UI/Icons/Navbar/BookmarkIcon";
import ListIcon from "../UI/Icons/Navbar/ListIcon";
import MoreIcon from "../UI/Icons/Navbar/MoreIcon";
import UserIcon from "../UI/Icons/Navbar/UserIcon";
import FeatherIcon from "../UI/Icons/Navbar/FeatherIcon";

export default {
    components: {
        FeatherIcon,
        UserIcon, MoreIcon, ListIcon, BookmarkIcon, MessageIcon, BellIcon, SearchIcon, HomeIcon, TwitterIcon}
}
</script>
