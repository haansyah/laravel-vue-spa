<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">New Note</div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="store">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input
                                    type="text"
                                    v-model="form.title"
                                    id="title"
                                    class="form-control"
                                />
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select
                                    v-model="form.subject"
                                    id="subject"
                                    class="form-control"
                                >
                                    <option disabled selected>
                                        Choose one
                                    </option>
                                    <option
                                        v-for="subject in subjects"
                                        :key="subject.id"
                                        :value="subject.id"
                                    >
                                        {{ subject.name }}
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea
                                    v-model="form.description"
                                    class="form-control"
                                    id="description"
                                    rows="5"
                                ></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                title: "",
                description: "",
                select: "",
            },
            subjects: [],
        };
    },

    mounted() {
        this.getSubject();
    },

    methods: {
        async getSubject() {
            let response = await axios.get("/api/subjects");
            if (response.status === 200) {
                this.subjects = response.data;
            }
        },

        async store() {
            let response = await axios.post(
                "/api/notes/create-new-note",
                this.form
            );
            if (response.status === 200) {
                (this.form.title = ""),
                    (this.form.description = ""),
                    (this.form.select = [1]);
            }
        },
    },
};
</script>

<style></style>
