<template>
    <button ref="destroyNote" @click="destroyNote">Delete</button>
</template>

<script>
export default {
    props: ["endpoint"],
    mounted() {},
    methods: {
        async destroyNote() {
            let q = window.confirm("Are you sure?");
            if (q == true) {
                let response = await axios.delete(
                    `/api/notes/${this.endpoint}/delete`
                );
                // console.log(this.endpoint);
                if (response.status == 200) {
                    this.$toasted.show(response.data.message, {
                        type: "success",
                        duration: 1000,
                    });

                    this.$refs.destroyNote.parentNode.parentNode.remove();
                }
            }
        },
    },
};
</script>
