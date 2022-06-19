import Home from "../views/Home.vue";
import About from "../views/About.vue";
import Contact from "../views/Contact.vue";

import TableOfNote from "../views/notes/Table.vue";
import NewNote from "../views/notes/Create.vue";
import ShowTheNote from "../views/notes/Show.vue";
import EditNote from "../views/notes/Edit.vue";

export default {
    mode: "history",
    linkActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/about",
            name: "pages.about",
            component: About,
        },
        {
            path: "/contact",
            name: "pages.contact",
            component: Contact,
        },
        {
            path: "/notes/create",
            name: "notes.create",
            component: NewNote,
        },
        {
            path: "/notes/table",
            name: "notes.table",
            component: TableOfNote,
        },
        {
            path: "/notes/:noteSlug/table",
            name: "notes.show",
            component: ShowTheNote,
        },
        {
            path: "/notes/:noteSlug/edit",
            name: "notes.edit",
            component: EditNote,
        },
    ],
};
