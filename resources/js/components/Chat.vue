<template>
    <div class="panel-block">
        <div class="chat" v-if="chats.length != 0" >
            <div v-for="chat in chats" style="overflow:auto;">
                <div class="chat-left" v-if="chat.user_id == userid">
                    {{ chat.chat }}
                </div>
                <div class="chat-right" v-else >
                    {{ chat.chat }}
                </div>
            </div>
        </div>
        <div v-else class="no-message">
            You are forever alone :)
        </div>

        <chat-composer :userid="userid" :chats="chats" :friendid="friendid" ></chat-composer>
    </div>
</template>

<script>
    export default {
        props: ['chats', 'userid', 'friendid'],
    }
</script>

<style scoped>
.panel-block {
    flex-direction: column;
}
.chat {
    width: 100%;
    padding: 20px;
    box-shadow: inset 0 0 20px 0 grey;
    margin-bottom: 20px;
    border: 1px solid grey;
    max-height: 600px;
    overflow-x: auto;
    font-size:14px;
    font-weight: 900;
    font-family: Raleway;
    letter-spacing: 2px;
}
.chat .chat-right, .chat .chat-left {
    max-width: 90%;
    box-shadow: 0 0 8px 0 grey;
    padding:8px;
    margin:4px;
}

.chat-right {
    float: right;
    background: #5DD2B2;
    color: white;
}

.chat-left {
    float: left;
    background:white;
}

.no-message {
    height:200px;
    display:flex;
    align-items:center;
}
</style>
