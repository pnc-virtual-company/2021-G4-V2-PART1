<template>
    <div v-show="show" class="overlay">
        <div class="dialog">
            <div class="dialog__content">
                <h2 class="dialog__title" v-text="title"></h2>
                <p class="dialog__description" v-text="description"></p>
            </div>
            <hr />
            <div class="dialog__footer">
                <button @click="cancel" class="dialog__cancel">Cancel</button>
                <button @click="confirm" class="dialog__confirm">Yes, delete it</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['show', 'title', 'description', 'cancel', 'confirm'],
    methods: {
        
    }
}
</script>

<style scoped>
    @import url("//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap");

    button {
        background-color: transparent;
        background-image: none;
    }

    button:focus {
        outline: 1px dotted;
        outline: 5px auto -webkit-focus-ring-color;
    }

    html {
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        line-height: 1.5;
    }

    body {
        font-family: inherit;
        line-height: inherit;
    }

    button {
        cursor: pointer;
    }

    .text-center{
        text-align: center;
    }

    body {
        background-color: #eee;
        font-family: Poppins, sans-serif;
    }

    .btn {
        --tw-bg-opacity: 1;
        background-color: rgba(37, 99, 235, var(--tw-bg-opacity));
        border-radius: 0.75rem;
        font-weight: 500;
        margin-right: 1rem;
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        padding-left: 1rem;
        padding-right: 1rem;
        --tw-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        --tw-text-opacity: 1;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
        -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
                user-select: none;
    }

    .btn:hover {
        --tw-bg-opacity: 1;
        background-color: rgba(30, 64, 175, var(--tw-bg-opacity));
        --tw-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .btn:focus {
        outline: 2px solid transparent;
        outline-offset: 2px;
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        --tw-ring-opacity: 1;
        --tw-ring-color: rgba(37, 99, 235, var(--tw-ring-opacity));
        --tw-ring-opacity: 0.5;
    }

    .overlay {
        --tw-bg-opacity: 1;
        background-color: rgba(0, 0, 0, var(--tw-bg-opacity));
        --tw-bg-opacity: 0.5;
        height: 100%;
        position: fixed;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        width: 100%;
        z-index: 10;
    }

    .dialog {
        background-color: rgb(150, 150, 150);
        border-radius: 0.75rem;
        margin-left: auto;
        margin-right: auto;
        margin-top: 2.5rem;
        max-width: 100%;
        width: 24rem;
    }

    .dialog__content {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .dialog__title {
        font-weight: 500;
        font-size: 1.125rem;
        line-height: 1.75rem;
        margin-bottom: 0.5rem;
    }

    .dialog__description {
        font-size: 0.875rem;
        line-height: 1.25rem;
        margin-bottom: 1rem;
    }

    .dialog__footer {
        display: flex;
        justify-content: flex-end;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .dialog__cancel {
        background-color: rgb(238, 164, 25);
        border-radius: 0.75rem;
        font-weight: 500;
        margin-right: 1rem;
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .dialog__cancel:focus{
        outline: 2px solid transparent;
        outline-offset: 2px;
    }

    .dialog__cancel:hover {
        background-color: orange;
        color: black;
    } 

    .dialog__confirm {
        background-color: rgb(240, 35, 35);
        border-radius: 0.75rem;
        font-weight: 500;
        margin-right: 1rem;
    }

    .dialog__confirm:focus{
        outline: 2px solid transparent;
        outline-offset: 2px;
    }

    .dialog__confirm{
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .dialog__confirm:hover {
        background-color: red;
        color: white;
    } 
</style>