<template>
    <div class="container">
        <h1>{{ note.title }}</h1>
        <hr />
        <h5>{{ note.published }} - {{ note.subject }}</h5>
        <h5>{{ note.description }}</h5>
    </div>
</template>

<script>
export default {
    data() {
        return {
            note: [],
        };
    },
    mounted() {
        this.getNote();
    },

    methods: {
        async getNote() {
            let response = await axios.get(
                "/api/notes/" + this.$route.params.noteSlug
            );
            this.note = response.data.data;
        },
    },
};
</script>

<style></style>
