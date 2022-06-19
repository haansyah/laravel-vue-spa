<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- <div v-if="successMessage" class="alert alert-success">
                    {{ successMessage }}
                </div> -->
                <div class="card">
                    <div class="card-header">New Note</div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="store">
                            <div class="form-group mt-2">
                                <label for="title">Title</label>
                                <input
                                    type="text"
                                    v-model="form.title"
                                    id="title"
                                    class="form-control"
                                />
                                <div
                                    v-if="theErrors.title"
                                    class="mt-2 text-danger"
                                >
                                    {{ theErrors.title[0] }}
                                </div>
                            </div>

                            <div class="form-group mt-2">
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
                                <div
                                    v-if="theErrors.subject"
                                    class="mt-2 text-danger"
                                >
                                    {{ theErrors.subject[0] }}
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="description">Description</label>
                                <textarea
                                    v-model="form.description"
                                    class="form-control"
                                    id="description"
                                    rows="5"
                                ></textarea>
                                <div
                                    v-if="theErrors.description"
                                    class="mt-2 text-danger"
                                >
                                    {{ theErrors.description[0] }}
                                </div>
                            </div>

                            <button
                                type="submit "
                                class="btn btn-primary d-flex align-items-center mt-2"
                            >
                                Save
                                <template v-if="loading">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        style="
                                            margin: auto;
                                            background: transparent;
                                            display: block;
                                            shape-rendering: auto;
                                        "
                                        width="30px"
                                        height="20px"
                                        viewBox="0 0 100 100"
                                        preserveAspectRatio="xMidYMid"
                                    >
                                        <rect
                                            x="17.5"
                                            y="30"
                                            width="15"
                                            height="40"
                                            fill="#e5fffd"
                                        >
                                            <animate
                                                attributeName="y"
                                                repeatCount="indefinite"
                                                dur="1s"
                                                calcMode="spline"
                                                keyTimes="0;0.5;1"
                                                values="18;30;30"
                                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1"
                                                begin="-0.2s"
                                            ></animate>
                                            <animate
                                                attributeName="height"
                                                repeatCount="indefinite"
                                                dur="1s"
                                                calcMode="spline"
                                                keyTimes="0;0.5;1"
                                                values="64;40;40"
                                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1"
                                                begin="-0.2s"
                                            ></animate>
                                        </rect>
                                        <rect
                                            x="42.5"
                                            y="30"
                                            width="15"
                                            height="40"
                                            fill="#a9fffa"
                                        >
                                            <animate
                                                attributeName="y"
                                                repeatCount="indefinite"
                                                dur="1s"
                                                calcMode="spline"
                                                keyTimes="0;0.5;1"
                                                values="20.999999999999996;30;30"
                                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1"
                                                begin="-0.1s"
                                            ></animate>
                                            <animate
                                                attributeName="height"
                                                repeatCount="indefinite"
                                                dur="1s"
                                                calcMode="spline"
                                                keyTimes="0;0.5;1"
                                                values="58.00000000000001;40;40"
                                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1"
                                                begin="-0.1s"
                                            ></animate>
                                        </rect>
                                        <rect
                                            x="67.5"
                                            y="30"
                                            width="15"
                                            height="40"
                                            fill="#79efe8"
                                        >
                                            <animate
                                                attributeName="y"
                                                repeatCount="indefinite"
                                                dur="1s"
                                                calcMode="spline"
                                                keyTimes="0;0.5;1"
                                                values="20.999999999999996;30;30"
                                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1"
                                            ></animate>
                                            <animate
                                                attributeName="height"
                                                repeatCount="indefinite"
                                                dur="1s"
                                                calcMode="spline"
                                                keyTimes="0;0.5;1"
                                                values="58.00000000000001;40;40"
                                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1"
                                            ></animate>
                                        </rect>
                                    </svg>
                                </template>
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
            // successMessage: "",
            subjects: [],
            theErrors: [],
            loading: false,
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
            this.loading = true;
            try {
                let response = await axios.post(
                    "/api/notes/create-new-note",
                    this.form
                );
                if (response.status === 200) {
                    this.form.title = "";
                    this.form.description = "";
                    this.form.subject = [];
                    this.theErrors = [];
                    this.loading = false;
                    // this.successMessage = response.data.message;

                    this.$toasted.show(response.data.message, {
                        type: "success",
                        duration: 3000,
                    });
                }
            } catch (e) {
                this.loading = false;
                this.theErrors = e.response.data.errors;
                this.$toasted.show("Something went wrong :(", {
                    type: "error",
                    duration: 3000,
                });
            }
        },
    },
};
</script>

<style></style>
