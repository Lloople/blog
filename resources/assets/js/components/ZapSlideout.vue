<template>
    <div class="zap-slideout"
         :class="{ isOpen: isOpen }">
        <div class="zap-slideout-opener bg-white text-dark p-4 no-underline shadow-md rounded"
             @click="toggle">{{openerText}}</div>
        <ul class="zap-slideout-menu">
            <li class="zap-slideout-menu-item">
                <img class="zap-emoji rounded-full" :src="blog.thumbnailUrl" :alt="blog.siteName" />
            </li>
            <li class="zap-slideout-menu-item--small" v-for="item in blog.menu">
                <a class="no-underline text-white" :href="item.url">{{ item.title }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
    module.exports = {
        data    : () => ({
            openerText: 'Open',
            isOpen    : false,
            blog
        }),
        methods : {
            open() {
                this.openerText = 'Close';
                this.isOpen     = true;
            },
            close() {
                this.openerText = 'Open';
                this.isOpen     = false;
            },
            toggle() {
                if (this.isOpen) {
                    this.close();
                } else {
                    this.open();
                }
            }
        }
    }
</script>

<style>
    .zap-slideout li {
        list-style: none;
    }
    .zap-slideout {
        position: fixed;
        width: 240px;
        height: 100vh;
        padding: 30px;
        background-color: #34495e;
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
        -webkit-transition: -webkit-transform 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
        transition: -webkit-transform 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
        transition: transform 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
        transition: transform 0.6s cubic-bezier(0.215, 0.61, 0.355, 1), -webkit-transform 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    .zap-slideout.isOpen {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }

    .zap-slideout-opener {
        position: fixed;
        top: 2rem;
        left: 100%;
        margin-left: 20px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        cursor: pointer;
    }


    .zap-slideout-menu {
        font-weight: 600;
        color: #fff;
    }

    .zap-slideout-menu-item,
    .zap-slideout-menu-item--small {
        cursor: pointer;
    }

    .zap-slideout-menu-item + .zap-slideout-menu-item,
    .zap-slideout-menu-item--small + .zap-slideout-menu-item, .zap-slideout-menu-item +
    .zap-slideout-menu-item--small,
    .zap-slideout-menu-item--small +
    .zap-slideout-menu-item--small {
        margin-top: 20px;
    }

    .zap-slideout-menu-item {
        font-size: 36px;
    }
    .zap-slideout-menu-item + .zap-slideout-menu-item--small {
        margin-top: 30px;
    }

    .zap-slideout-menu-item--small {
        font-size: 18px;
        font-weight: normal;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #ecf0f1;
    }

    /* The famed Zap agency logo (TM) */
    .zap-emoji {
        height: 120px;
    }
</style>