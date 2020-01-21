<template>
    <div class="panel-block field">
        <div class="control">
            <input type="text" class="input" v-model="chat" v-on:keyup.enter="sendChat">
        </div>
        <div class="control autp-w">
            <input type="button" class="button" value="Send"
            v-on:click="sendChat">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userid', 'friendid', 'chats'],
        data() {
            return {
                chat: ''
            };
        },

        methods: {
            sendChat(e) {
                if (this.chat != '') {
                    var data = {
                        chat: this.chat,
                        friend_id: this.friendid,
                        user_id: this.userid
                    }
                }
                this.chat = '';

                this.send(data);
            },

            send(data) {
                axios.post('/chat/sendChat', data)
                    .then((res) => {
                        this.chats.push(data);
                    });
            },
        }
    }
</script>

<style scoped>
    .panel-block {
        flex-direction: row;
        border:none;
        width:100%;
    }

    .input {
        border-radius:0;
    }

    .autp-w {
        width:auto;
    }
</style>
