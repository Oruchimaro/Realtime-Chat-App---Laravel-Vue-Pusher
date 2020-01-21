require('./bootstrap');

 window.Vue = require('vue');

/**
 * create a fresh Vue application instance and attach it to the page.
 * Then, you may begin adding components to this application
 */

/* Components */
 Vue.component('chat', require('./components/Chat.vue').default);
 Vue.component('chat-composer', require('./components/ChatComposer.vue').default);



 const app = new Vue({
     el: '#app',

     data: {
        chats: ''
     },

     created() {
        //pass the userId from meta-tag to vue root element
        const userId = $('meta[name="userId"]').attr('content');
        const friendId = $('meta[name="friendId"]').attr('content');

        if (friendId != undefined) {
            axios.post('/chat/getChat/' + friendId )
            .then((response) => {
                this.chats = response.data;
            });

            //this chat.friendId.userId because we we send a message to other
            //persons computer the id of freind and user interchange
            Echo.private('Chat.' + friendId + '.' + userId)
            .listen('BroadcastChat', (e) => {
                //play a sound
                document.getElementById('chau').play();

                this.chats.push(e.chat); 
            });
        }
     },
 });


// Bulma NavBar Burger Script
document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {
                
                // Get the target from the "data-target" attribute
                let target = $el.dataset.target;
                let $target = document.getElementById(target);
                
                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
                
            });
        });
    }
    
});



require('./bulma-extensions');
